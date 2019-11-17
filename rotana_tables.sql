
create table products
(
ps_id number(5) primary key,
ps_name varchar2(30) unique
)
/

create table store
(
s_id number(5) primary key,
s_name varchar2(30) ,
s_type varchar2(30),
s_qty number(20)check(s_qty >=0),
s_price number(8,2)check(s_price >=0),
s_val number(20),
s_lval number(20),
s_add_date date
)
/
create table product
(
p_id number(10) primary key,
s_id number(10) references store(s_id),
p_name varchar2(30),
p_qty number(10) check(p_qty>=0),
p_fees number(20),
p_price number(20),
P_date date,
p_lno varchar2(30),
p_drname varchar2(50),
P_type  number(1),
p_selprice number(20),
p_profit number(20),
p_loss number(20),
p_cargo date,
p_cf number(20),
p_comm varchar2(50),
p_cf_date date
)
/



create table users
(
u_id number(2) primary key,
u_name varchar2(30),
u_fname varchar2(50),
u_pass varchar2(20),
u_status number(1),
u_level number(1),
u_phone varchar2(30)
)
/

create table wokala
(
w_id number(5) primary key,
w_name varchar(50),
w_phone varchar(30)
)
/
create table customer
(
c_id number(5) primary key,
w_id number(5) references wokala(w_id),
c_name varchar2(50),
c_add varchar2(50),
c_type varchar2(10),
c_phone varchar2(30),
c_supp number(1),
c_buy number(1),
c_qty number(5),
c_buy_mteh char(1),
c_o_id number(5),
c_sortid number(5)
)
/

create table customer_buys
(
cb_id number(10) primary key,
c_id number(5) references customer(c_id),
cb_qty number(5),
cb_date date
)
/



create table  buys  
(
b_id number(5),
b_name varchar2(50),
b_add varchar2(50),
b_phone varchar2(30),
b_buy number(1),
b_qty number(5),
b_buy_mteh char(1),
b_o_id number(5),
b_amount  number(10),
b_date date
)
/
create table ordr
(
o_id number(10) primary key,
o_type varchar2(15),
u_id number(2) references users (u_id),
c_id number(5),
o_ptype VARCHAR2(10),
o_cname varchar2(50),
o_date date
)
/

create table order_details
(
od_id number(10) primary key,
o_id number(10) references ordr(o_id),
s_id number(5) references store(s_id),
od_qty number(5)check(od_qty>=0),
od_price number(8,2)check(od_price>=0),
od_pname VARCHAR2(30)
)
/

create table outgoings
(
og_id number(10) primary key,
og_name varchar2(50),
u_id number(2) references users (u_id),
og_amount number(8,2)check(og_amount>=0),
og_date date
)
/

create table emp
(
emp_id number(5) primary key,
emp_name varchar2(50),
emp_phone varchar2(30),
emp_job varchar2(30),
emp_hdate date,
emp_sal number(10) check(emp_sal>=0)
)
/

create table salaries
(
sal_id number(5) primary key,
sal_month date
sal_ename varchar2(50),
sal_sal number(10))
emp_id number(5) references emp(emp_id),
sal_date date
)
/
create table history
(
h_date date,
h_prd varchar2(50),
h_pre number(10),
h_add number(10),
h_post number(10)
)
/

create or replace trigger his_t
after delete or insert or update of s_val on store
for each row
declare
v_add number(10);
begin
insert into history(h_date,h_prd,h_pre,h_add,h_post)
values(to_char(sysdate,'MM'),:old.s_name,:old.s_qty,nvl(:new.s_qty,0)-nvl(:old.s_qty,0),:new.s_qty);
end;
/

CREATE OR REPLACE TRIGGER STORE_t 
after insert or update of od_qty or delete on order_details
for each row
begin
if inserting then
update store set s_qty=s_qty-:new.od_qty
where s_id=:new.s_id;
elsif updating then
update store set s_qty=s_qty-(:new.od_qty-:old.od_qty)
where s_id=:old.s_id;
elsif deleting then
update store set s_qty=s_qty+:old.od_qty
where s_id=:old.s_id;
end if;
end;
/


create view order_dtl
(order_id,price)
as select od.o_id,sum(od.od_price)
from ordr o join order_details od
 on o.o_id=od.o_id
 group by od.o_id
/