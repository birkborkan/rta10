   function httprequest()
     { var x;
            if(window.XMLHttpRequest){
            x=new XMLHttpRequest();
            }else{
              x=new ActiveXObject("Microsoft.XMLHTTP");  
            }
      return x;
     }
      function new_exp(){
          var httpreq
      httpreq = httprequest();
             //httpreq=httprequest();
  httpreq.onreadystatechange=function() {
       if(this.readyState==4 & this.status==200 )
           {
            document.getElementById("jax").innerHTML=this.responseText;
           }else
          {
              document.getElementById("jax").innerHTML="<center><img src='img/ajax-loader2.gif'/>";   
          }
           
      }
       httpreq.open("GET","exports_insert.php",true);
       httpreq.send();
   }

// insert new data to exports
function new_insert() {
        var httpreq;
     httpreq = httprequest();
      httpreq.onreadystatechange=function()
     {
    
            if(this.readyState==4 & this.status==200 )
           { 
           document.getElementById("rname").value=""; 
         document.getElementById("cno").value=""; 
        document.getElementById("dname").value=""; 
     
         document.getElementById("pqty").value=""; 
          document.getElementById("bcost").value=""; 
          document.getElementById("dcost").value=""; 
         document.getElementById("lcost").value=""; 
        document.getElementById("manifist").value=""; 
       document.getElementById("ldate").value=""; 
        document.getElementById("comm").value="";
               if(this.responseText ==="insert_is_done"){
                   alert("تم العملية بنجاح");
               }
           }
		 
      }       //rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,ldate,comm
             var rname=document.getElementById("rname").value; 
             var cno=document.getElementById("cno").value; 
             var dname=document.getElementById("dname").value; 
             var pname=document.getElementById("pname").value; 
             var pqty=document.getElementById("pqty").value; 
             var bcost=document.getElementById("bcost").value; 
             var dcost=document.getElementById("dcost").value; 
             var lcost=document.getElementById("lcost").value; 
             var manifist=document.getElementById("manifist").value; 
             var ldate=document.getElementById("ldate").value; 
             var comm=document.getElementById("comm").value;
            if(rname=='' ||cno=='' ||pname=='' )
                {
                    alert("يجب ملئ البيانات");
                }
            else
                {
            var new_data="rname="+rname+"&cno="+cno+"&dname="+dname+"&pname="+pname+"&pqty="+pqty +"&bcost="+bcost+"&dcost="+dcost+"&lcost="+lcost+"&manifist="+manifist+"&ldate="+ldate+"&comm="+comm;
            httpreq.open("GET","exports_insert_done.php?"+new_data,true);
            
            httpreq.send();
                    }

   }
// select exports data
          function select_exp(){
          var httpreq
      // httpreq = new XMLHttpRequest();
             httpreq=httprequest();
  httpreq.onreadystatechange=function() {
       if(this.readyState==4 & this.status==200 )
           {
            document.getElementById("jax").innerHTML=this.responseText;
           }else
          {
              document.getElementById("jax").innerHTML="<center><img src='img/ajax-loader2.gif'/>";   
          }
           
      }
       httpreq.open("GET","exports_select.php",true);
       httpreq.send();
   }
     // search in exports
 function exp_search()
{
               var httpreq
      // httpreq = new XMLHttpRequest();
             httpreq=httprequest();
  httpreq.onreadystatechange=function() {
       if(this.readyState==4 & this.status==200 )
           {
            document.getElementById("jax").innerHTML=this.responseText;
           }else
          {
              document.getElementById("jax").innerHTML="<center><img src='img/ajax-loader2.gif'/>";   
          }
           
      }
        var sch=document.getElementById("sch").value; 
            var date=document.getElementById("date").value; 
            var search=document.getElementById("search").value; 
        
            if(date == '' & search == '' )
                {
                    alert("يجب  اختيار تاريخ او نص للبحث");
                }
                  else
                {
            var sech_data="sch="+sch+"&date="+date+"&search="+search;
            httpreq.open("GET","exports_search.php?"+sech_data,true);
            httpreq.send();
                    } 
       
     }
          // search  exports between two dates
 function exp_search_btds()
 {
                var httpreq
       // httpreq = new XMLHttpRequest();
              httpreq=httprequest();
   httpreq.onreadystatechange=function() {
        if(this.readyState==4 & this.status==200 )
            {
             document.getElementById("jax").innerHTML=this.responseText;
            }else
           {
               document.getElementById("jax").innerHTML="<center><img src='img/ajax-loader2.gif'/>";   
           }
            
       }
         var sch=document.getElementById("sch").value; 
             var date1=document.getElementById("startd").value; 
             var date2=document.getElementById("endd").value; 
         
             if(date1 == '' || date2 == '' )
                 {
                     alert("يجب  اختيار تاريخ البداية والنهاية للبحث");
                 }
                   else
                 {
             var sech_data="date1="+date1+"&date2="+date2;
             httpreq.open("GET","exports_search_dates.php?"+sech_data,true);
             httpreq.send();
                     } 
        
      }
 function logout()
     {         var httpreq;
     httpreq = httprequest();
      httpreq.onreadystatechange=function()
	  {
         if(this.readyState<4)
          {
              document.getElementById("jax").innerHTML="<center><img src='img/ajax-loader2.gif'/>";
			  
		  } else {
              
                     if(this.responseText === "sdlogout")
                     {

                      window.location.assign("login.php")
						 
                     }
                     else
                     {
                          window.location.assign("login.php")
						 	 
                      }
                 
			  }
		
		  }
	       httpreq.open("GET","logout.php",true);
       httpreq.send();
	 }
// delete export
function del_data(eid){
    var httpreq
httpreq = httprequest();
       //httpreq=httprequest();
httpreq.onreadystatechange=function() {
 if(this.readyState==4 & this.status==200 )
     { if(this.responseText === "done"){
        document.getElementById('jax').innerHTML = "<span style='color:green;'> تم حذف منتج بنجاح  </span>";
        select_exp();
     }
       
      } else {
        document.getElementById("jax").innerHTML="<center><img src='img/ajax-loader2.gif'/>";   
    }
     
}
if(confirm(" هل تريد مسح منتج ")){

 httpreq.open("GET","exports_delete.php?eid="+eid,true);
 httpreq.send();
}
}
         