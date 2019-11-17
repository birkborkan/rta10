///go to top
function topFunction() {

    $([document.documentElement, document.body]).animate({
        scrollTop: $("body").offset().top
    }, 1000);

}


// / thiis login function
$(document).ready(function() {
    $('.hide_show').click(function() {
        $('#down_from_top').slideUp()
        $('.drop_value').html(' ')
    })

    /*
 $(".btn1").click(function(){
  
})
 ** $(".btn2").click(function(){
  $("p").slideDown()
   })
  */

    ;
    (function pulse(back) {
        $('#seventyfive').animate({
            width: (back) ? $('#seventyfive').width() + 3 : $('#seventyfive').width() - 3
        }, 700)
        $('#seventyfive').animate({
            'font-size': (back) ? '100px' : '140px',
            opacity: (back) ? 1 : 0.2
        }, 700, function() { pulse(!back) })
    })(false)
})

// login --------------- login --------------- login --------------- login ---------------
function login() {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('loading').innerHTML = ''
            if (this.responseText === 'done_ok') {
                window.location.assign('/rta10')
                    // window.location.assign("index.php")
            } else if (this.responseText === 'done_no') {
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:red;'> ليس لديك صلاحية الدخول للنظام الرجاء مقابلة الإدارة </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            } else if (this.responseText === 'not_found') {
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:red;'>  اسم المستخدم او كلمة المرور خطأ </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            }
        } else {
            document.getElementById('loading').innerHTML = "<img src='img/ajax-loader2.gif'/>" + '     Loading ...'
        }
    }
    var username2 = document.getElementById('username').value
    var password2 = document.getElementById('password').value
    if (username2 == '' || password2 == '') {
        document.getElementById('error').innerHTML = 'الرجاء ملئ اسم المستخدم وكلمة المرور'
    } else {
        document.getElementById('error').innerHTML = ''
        xhttp.open('POST', 'login_done.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('username=' + username2 + '&password=' + password2)
    }
}
// logout ---------------------logout-------------logout-------------------logout
// logout function 
function logout() {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.assign('login.php')
            document.getElementById('titley').innerHTML = 'الوقت'
        } else {
            document.getElementById('titley').innerHTML = "<img src='img/ajax-loader.gif'/> &nbsp; جاري تسجيل الخروج ........"
        }
    }
    if (confirm('هل تريد تسجيل الخروج')) {
        xhttp.open('POST', 'logout.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send()
    }
}
// check Permission --------------check Permission---------------------check Permission----------------  
function check_permission(url) {
    var result;
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           result = this.responseText;
         // alert(result);
         return result;
       }}   
       xhttp.open("POST", "check_permission.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("url=" + url);
   
}
// this is give for giving the pages to the div!!! give_pages give_pages give_pages give_pages give_pages give_pages give_pages
function give_pages(url, titlee) {
    //var result1 = check_permission(url);
    //alert(result1);
    var per = document.getElementById('per').innerHTML;
 
    if (url === "add_muli_exports.php") {
        //document.getElementById('bet').style.display='block';
        $(document).ready(function() {
            $('#expand').click(function() {
                $('#qty_title').slideDown();
                $('#pqty').slideDown();
            });
        });
    }
    document.getElementById("report_content").innerHTML = "";
    document.getElementById("report_title").innerHTML = "";

    if (url === 'show_all_export.php' || url === 'show_all_waiting.php' || url === 'show_all_fatora.php' || url === 'show_all_import.php' || url === 'show_all_history.php' || url === 'shb.php' || url === 'add_multi_exports.php')  {
        $(document).ready(function() {
            $('.col-lg-3').hide()
            $('#col_large').addClass('col-lg-12')
            $('#col_large').addClass('col-xl-12')
            $('#accordionSidebar').addClass('toggled')
        })
    } else {
        $('.col-lg-3').show()
        $('#col_large').removeClass('col-lg-12')
        $('#col_large').removeClass('col-xl-12')
        $('#accordionSidebar').removeClass('toggled')
    }

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('titley').innerHTML = titlee
            document.getElementById('contenty').innerHTML = this.responseText
            $(document).ready(function() {
                $('.drop_value2').html(' ')
                $('#down_from_top2').fadeOut()
            })
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }

    xhttp.open('POST', url, true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send()
}
// add new faculty 

// add new product
function add_pro(per) {
   
    var pro_name = document.getElementById('pro_name').value
    var pro_type = document.getElementById('pro_type').value
    var pro_price = document.getElementById('pro_price').value

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'done') {
                document.getElementById('titley').innerHTML = 'إضافة منتج  جديد'
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:blue;'>  تم اضافة المنتج " + pro_name + '  بنجاح</span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            } else if (this.responseText === 'found') {
                document.getElementById('titley').innerHTML = 'إضافة منتج  جديد'
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:red;'> المنتج " + pro_name + ' موجود مسبقآ</span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html(' ')
                    $('#down_from_top2').fadeIn()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }
    if (pro_name === '' || pro_price === '') {
        document.getElementById('titley').innerHTML = 'إضافة منتج  جديد'

        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'>  رجاء ملئ كل الحقول  </span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()
        })
    } else {
          if(per != 3)
          {
            $(document).ready(function() {
                $('.drop_value').html("<span style='color:red;'> ليس لديك صلاحية اضافة منتج  </span>")
                $('#down_from_top').slideDown().delay(3000).fadeOut()
            })
          } else
          {
            xhttp.open('POST', 'store_insert_done.php', true)
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            xhttp.send('pro_name=' + pro_name + '&pro_type=' + pro_type + '&pro_price=' + pro_price)
          }

    }
}

// add new  saderat
function add_exp(per) {
    
    var rname = document.getElementById('rname').value
    var cno = document.getElementById('cno').value
    var dname = document.getElementById('dname').value
    var pname = document.getElementById('pname').value
    var pqty = document.getElementById('pqty').value
    var bcost = document.getElementById('bcost').value
    var dcost = document.getElementById('dcost').value
    var lcost = document.getElementById('lcost').value
    var manifist = document.getElementById('manifist').value
    var ldate = document.getElementById('ldate').value
    var comm = document.getElementById('comm').value

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'done') {
                document.getElementById('titley').innerHTML = 'إضافة صادر  جديد'

                $(document).ready(function() {
                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()

                    $('.drop_value').html("<span style='color:red;'>  تم اضافة منتج  " + pname + ' بنجاح  </span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            } else if (this.responseText === 'found') {
                document.getElementById('titley').innerHTML = 'إضافة صادر  جديد'
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:red;'>    عذرآ تم إضافة منتج " + pname + '  مسبقآ بتاريخ ' + ldate + '  <br> رجاء مراجعة الصادرات</span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    if (rname === '' || cno === '' || pname === '' || dname === '' || ldate === '') {
        document.getElementById('titley').innerHTML = 'إضافة صادر  جديد'

        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'>  رجاء ملئ كل الحقول  </span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()
        })
    } else {
                if(per != 2)
                {
                    $(document).ready(function() {
                        $('.drop_value').html("<span style='color:red;'>2ليس صلاحية اضافة صادر </span>")
                        $('#down_from_top').slideDown().delay(3000).fadeOut()
                    }) 
                    
                }
                else
                {
                    xhttp.open('POST', 'exports_insert_done.php', true)
                    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
                    xhttp.send('rname=' + rname + '&cno=' + cno + '&dname=' + dname + '&pname=' + pname + '&pqty=' + pqty + '&bcost=' + bcost + '&dcost=' + dcost + '&lcost=' + lcost + '&manifist=' + manifist + '&ldate=' + ldate + '&comm=' + comm)
                
                }
                
           }
}
// add new  employee
function add_employee() {
    var ename = document.getElementById('ename').value
    var ephone = document.getElementById('ephone').value
    var ejob = document.getElementById('ejob').value
    var esal = document.getElementById('esal').value
    var ehdate = document.getElementById('ehdate').value

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('titley').innerHTML = 'إضافة موظف  جديد'
            if (this.responseText === 'done') {
                document.getElementById('titley').innerHTML = 'إضافة موظف  جديد'

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>   تم توظيف " + ename + '  في وظيفة ' + ejob + ' بنجاح</span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            } else if (this.responseText === 'found') {
                document.getElementById('titley').innerHTML = 'إضافة موظف  جديد'
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>  الموظف " + ename + ' موجود فعلآ</span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    if (ename === '') {
        document.getElementById('titley').innerHTML = 'إضافة موظف  جديد'

        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'>  رجاء ملئ كل الحقول  </span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()
        })
    } else {
        // ename ,ephone,ejob,esal,ehdate
        xhttp.open('POST', 'add_new_employee_done.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

        xhttp.send('ename=' + ename + '&ephone=' + ephone + '&ejob=' + ejob + '&esal=' + esal + '&ehdate=' + ehdate)
    }
}

function search(url, title) {
    var search_text = document.getElementById('search_text').value

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('titley').innerHTML = title
                document.getElementById('search_content').innerHTML = this.responseText
                $(document).ready(function() {
                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            } else {
                $(document).ready(function() {
                    $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                    $('#down_from_top2').fadeOut()
                })
            }
        }
        // "search_text="+search_text)
    xhttp.open('POST', url, true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('search_text=' + search_text)
}
// ecit employee
function edit_employee(url) {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('edit_content').innerHTML = this.responseText
            document.getElementById('titley').innerHTML = 'عرض البيانات'
            $(document).ready(function() {
                $('.drop_value2').html(' ')
                $('#down_from_top2').fadeIn()
            })
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    xhttp.open('POST', 'edit_employee.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('id=' + url)
}

function edit_employee_done(url) {
    var ename = document.getElementById('ename').value
    var ephone = document.getElementById('ephone').value
    var ejob = document.getElementById('ejob').value
    var esal = document.getElementById('esal').value
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'done') {
                give_pages('show_all_employee.php', ' عرض الموظفين    ')
                document.getElementById('edit_content').innerHTML = ''
                document.getElementById('titley').innerHTML = 'عرض البيانات'

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>        تم تعديل بيانات بنجاح     </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    xhttp.open('POST', 'edit_employee_done.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('ename=' + ename + '&ephone=' + ephone + '&ejob=' + ejob + '&esal=' + esal + '&post_id=' + url)
}

function delete_(del_id, url_del, url_show, title, title_del, table_name, table_id,per) {
    var tper;
        if(table_name == "store" || table_name == "login" || table_name == "salaries" || table_name == "tored" || table_name == "emp")
        {
        tper=3;
        } else if(table_name == "store_exp")
         {
         tper=2;
         }
 
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            if (this.responseText === "done") {

                $(document).ready(function() {

                    $(".drop_value").html("<span style='color:red;'>   تم حذف " + title + " بنجاح   </span>");
                    $("#down_from_top").slideDown().delay(3000).fadeOut();
                });
                give_pages(url_show, title_del);

                document.getElementById('titley').innerHTML = "عرض البيانات";

                $(document).ready(function() {

                    $(".drop_value2").html("");
                    $("#down_from_top2").fadeIn();

                });
            } else if (this.responseText === "delete_0") {
                $(document).ready(function() {

                    $(".drop_value").html("<span style='color:red;'> فشل العملية..هذا الصنف به كمية او مرتبط بالصادر او وارد</span>");
                    $("#down_from_top").slideDown().delay(3000).fadeOut();
                });
            }

        } else {
            $(document).ready(function() {

                $(".drop_value2").html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>");
                $("#down_from_top2").fadeOut();

            });
        }
    };
    if(per != tper)
    {
        $(document).ready(function() {
         $(".drop_value").html("<span style='color:red;'> ليس لديك صلاحية حذف البيانات </span>");
         $("#down_from_top").slideDown().delay(3000).fadeOut();
        });
    }
    else
    {
        if (confirm("هل تريد حذف " + title)) {
            xhttp.open("POST", url_del, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("del_id=" + del_id + "&table_name=" + table_name + "&table_id=" + table_id);
        }
    }


}
// add salaries
function add_sal() {
    var eid = document.getElementById('e_info').value

    var smonth = document.getElementById('smonth').value
    var sdate = document.getElementById('sdate').value

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'done') {
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:blue;'>  تم الإضافة بنجاح </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            } else if (this.responseText === 'found') {
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:red;'>  تم الإضافة مسبقآ </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    if (smonth === '' || sdate === '') {
        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'>  رجاء ملئ جميع الحقول</span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()
        })
    } else {
        xhttp.open('POST', 'add_sal_done.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

        xhttp.send('eid=' + eid + '&smonth=' + smonth + '&sdate=' + sdate)
    }
}

//                    edit products
function edit_product(url) {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $(document).ready(function() {
                $('.drop_value2').html(' ')
                $('#down_from_top2').fadeIn()
            })
            document.getElementById('edit_content').innerHTML = this.responseText
            document.getElementById('titley').innerHTML = 'عرض البيانات'
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    xhttp.open('POST', 'edit_product.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('id=' + url)
}

function edit_product_done(url) {
    var sname = document.getElementById('sname').value
    var sprice = document.getElementById('sprice').value
    var stype = document.getElementById('stype').value
    var sdate = document.getElementById('sdate').value
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText)
                if (this.responseText === 'done') {
                    give_pages('show_all_product.php', ' عرض المنتجات    ')
                    document.getElementById('edit_content').innerHTML = ''
                    document.getElementById('titley').innerHTML = 'عرض البيانات'

                    $(document).ready(function() {
                        $('.drop_value2').html(' ')
                        $('#down_from_top2').fadeIn()
                        $('.drop_value').html("<span style='color:green;'>        تم تعديل بيانات بنجاح     </span>")
                        $('#down_from_top').slideDown().delay(3000).fadeOut()
                    })
                } else if (this.responseText === 'found') {
                    $(document).ready(function() {
                        $('.drop_value2').html(' ')
                        $('#down_from_top2').fadeIn()
                        $('.drop_value').html("<span style='color:green;'> لا يمكن تعديل منتج به  بيانات </span>")
                        $('#down_from_top').slideDown().delay(3000).fadeOut()
                    })
                }
            } else {
                $(document).ready(function() {
                    $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                    $('#down_from_top2').fadeOut()
                })
            }
        }
        // alert(sname+sprice+stype+sdate)
    xhttp.open('POST', 'edit_product_done.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('sname=' + sname + '&sprice=' + sprice + '&stype=' + stype + '&sdate=' + sdate + '&sno=' + url)
}
// edit salaries

function edit_sal(url) {
    var name = document.getElementById('name_' + url).innerHTML

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $(document).ready(function() {
                $('.drop_value2').html(' ')
                $('#down_from_top2').fadeIn()
            })
            document.getElementById('edit_content').innerHTML = this.responseText
            document.getElementById('titley').innerHTML = 'عرض البيانات'
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    xhttp.open('POST', 'edit_sal.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('id=' + url + '&name=' + name)
}
// edit salaries done
function edit_sal_done(url) {
    var sdate = document.getElementById('sdate').value
    var smonth = document.getElementById('smonth').value

    var esal = document.getElementById('esal').value
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'done') {
                give_pages('show_all_sal.php', ' عرض المرتبات ')
                document.getElementById('edit_content').innerHTML = ''

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>        تم تعديل بيانات بنجاح     </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    xhttp.open('POST', 'edit_sal_done.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('sdate=' + sdate + '&esal=' + esal + '&smonth=' + smonth + '&post_id=' + url)
}


//edit export ---------------------------------------------------  ****************************************
function edit_export(url, arr) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('edit_content').innerHTML = this.responseText;
            document.getElementById('titley').innerHTML = "تعديل بيانات الصادر ";
        } else {
            document.getElementById('titley').innerHTML = "<img src='img/ajax-loader.gif'/> &nbsp; جاري جلب البيانات ........";

        }
    };
    if (arr === 1) {
        $(document).ready(function() {

            $(".drop_value").html("<span style='color:red;'> لا يمكن تعديل بيانات الصادر بعد استلامه</span>");
            $("#down_from_top").slideDown().delay(3000).fadeOut();
        });
    } else {
        xhttp.open("POST", "edit_export.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + url);
    }
}

function edit_export_done(url) {
    //  rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm
    var rname = document.getElementById('rname').value
    var cno = document.getElementById('cno').value
    var dname = document.getElementById('dname').value
    var pname = document.getElementById('pname').value
    var pqty = document.getElementById('pqty').value
    var bcost = document.getElementById('bcost').value
    var dcost = document.getElementById('dcost').value
    var lcost = document.getElementById('lcost').value
    var manifist = document.getElementById('manifist').value
    var ldate = document.getElementById('ldate').value
    var comm = document.getElementById('comm').value
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText === 'done') {
                    give_pages('show_all_export.php', ' عرض الصادرات')
                    document.getElementById('edit_content').innerHTML = ''
                    document.getElementById('titley').innerHTML = 'عرض البيانات'

                    $(document).ready(function() {
                        $('.drop_value').html("<span style='color:green;'>        تم تعديل بيانات بنجاح     </span>")
                        $('#down_from_top').slideDown().delay(3000).fadeOut()
                    })
                }
            } else {
                document.getElementById('titley').innerHTML = "<img src='img/ajax-loader.gif'/> &nbsp; جاري جلب البيانات ........"
            }
        }
        // alert(sname+sprice+stype+sdate)
        // //  rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm
    xhttp.open('POST', 'edit_export_done.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('rname=' + rname + '&cno=' + cno + '&dname=' + dname + '&pname=' + pname + '&pqty=' + pqty + '&bcost=' + bcost + '&dcost=' + dcost + '&lcost=' + lcost + '&manifist=' + manifist + '&ldate=' + ldate + '&comm=' + comm + '&eid=' + url)
}

function birk() {
    $(document).ready(function() {
        alert($('#dataTable').scrollTop())
    })
}

// add new  waiting ---------------------------------------------------
function add_waiting_done(url) {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // alert(this.responseText)
            if (this.responseText == 'done') {
                give_pages('show_all_waiting.php', ' عرض وارد المنتظر ')
                document.getElementById('edit_content').innerHTML = ''; // this.responseText
                document.getElementById('titley').innerHTML = 'تم الاستلام بنجاح   '

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>  تم استلام الوارد بنجاح   </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            }
        } else {
            // document.getElementById('titley').innerHTML = "<img src='img/ajax-loader.gif'/> &nbsp; جاري جلب البيانات ........"
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    if (confirm('هل تريد استلام الوارد؟', 'الرسالة التاكيد')) {
        xhttp.open('POST', 'add_new_stlam_done.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('eid=' + url)
    }
}

// add import to store   ---------------------------------------------------
function add_store(url, sid) {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == 'done') {
                give_pages('show_all_import.php', ' عرض وارد المخزن ')
                document.getElementById('edit_content').innerHTML = ''; // this.responseText
                document.getElementById('titley').innerHTML = 'تم تخزين بنجاح   '

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>  تم تخزين بنجاح   </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            } else {
                document.getElementById('titley').innerHTML = ' عرض وارد المخزن '

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'> فشل العملية الرجاء محاولة مرة اخرى!!   </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    if (confirm('هل تريد اضافةالوارد للمخزن؟', 'الرسالة التاكيد')) {
        xhttp.open('POST', 'update_store_done.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('eid=' + url + '&sid=' + sid)
    }
}

// check stor ---------------------------------------------------
function check_store() {
    document.getElementById('titley').innerHTML = ' عرض وارد المخزن '

    $(document).ready(function() {
        $('.drop_value').html("<span style='color:red;'> لقد قمت باضافة الوارد مسبقا    </span>")
        $('#down_from_top').slideDown().delay(3000).fadeOut()

        $('.drop_value2').html('')
        $('#down_from_top2').fadeIn()
    })
}

// edit import ---------------------------------------------------
function edit_import(url, stor_val) {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('edit_content').innerHTML = this.responseText
            document.getElementById('titley').innerHTML = 'تعديل بيانات الصادر '
        } else {
            document.getElementById('titley').innerHTML = "<img src='img/ajax-loader.gif'/> &nbsp; جاري جلب البيانات ........"
        }
    }
    if (stor_val === 0) {
        xhttp.open('POST', 'edit_import.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('id=' + url)
    } else {
        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'>لا يمكن تعديل الكمية بعد التخزين</span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()
        })
    }
}

function edit_import_done(url) {
    //  rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm
    var borsa = document.getElementById('borsa').value
    var miss = document.getElementById('miss').value
    var stor = document.getElementById('stor').value
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText)
                if (this.responseText === 'done') {
                    give_pages('show_all_import.php', ' عرض وارد المستلم')
                    document.getElementById('edit_content').innerHTML = ''
                    document.getElementById('titley').innerHTML = 'عرض البيانات'

                    $(document).ready(function() {
                        $('.drop_value').html("<span style='color:green;'>        تم تعديل بيانات بنجاح     </span>")
                        $('#down_from_top').slideDown().delay(3000).fadeOut()
                    })
                } else if (this.responseText === 'no') {
                    $(document).ready(function() {
                        $('.drop_value').html("<span style='color:red;'>لا يمكن تعديل الكمية بعد التخزين</span>")
                        $('#down_from_top').slideDown().delay(3000).fadeOut()
                    })
                }
            } else {
                document.getElementById('titley').innerHTML = "<img src='img/ajax-loader.gif'/> &nbsp; جاري جلب البيانات ........"
            }
        }
        // alert(sname+sprice+stype+sdate)
        // //  rname,cno,dname,pname,pqty,ptype,bcost,dcost,lcost,manifist,tcost,ldate,arrive,comm
    xhttp.open('POST', 'edit_import_done.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('borsa=' + borsa + '&miss=' + miss + '&stor=' + stor + '&eid=' + url)
}
// add new  user  ------------------add new  user ------------------------------add new  user  
function add_user() {
    var dept
    var ufname = document.getElementById('ufname').value
    var uname = document.getElementById('uname').value
    var upass = document.getElementById('upass').value
    var uper = document.getElementById('uper').value
    var ustatus = document.getElementById('ustatus').value
    if (uper == '1') { dept = 'الادارة' } else if (uper == '2') { dept = 'الصادر' } else if (uper == '3') { dept = 'الوارد' } else { dept = 'المبيعات' }

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('titley').innerHTML = 'إضافة مستخدم  جديد'
            if (this.responseText === 'done') {
                document.getElementById('titley').innerHTML = 'إضافة مستخدم  جديد'

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>   تم اضافة مستخدم " + ufname + '  في  ' + dept + ' بنجاح</span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeOut()
                })
            } else if (this.responseText === 'found') {
                document.getElementById('titley').innerHTML = 'إضافة مستخدم  جديد'
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>  المستخدم " + ufname + ' موجود فعلآ</span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }

    if (ufname === '' || uname === '' || upass === '') {
        document.getElementById('titley').innerHTML = 'إضافة موظف  جديد'

        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'>  رجاء ملئ كل الحقول  </span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()
        })
    } else {
        if (upass.length < 8) {
            $(document).ready(function() {
                $('.drop_value').html("<span style='color:red;'> يجب ان تكون كلمة المرور اكثر من 7 احرف    </span>")
                $('#down_from_top').slideDown().delay(3000).fadeOut()
            })
        } else if (uname.length < 5) {
            $(document).ready(function() {
                $('.drop_value').html("<span style='color:red;'> يجب ان  يكون اسم المستخدم اكثر من 4 احرف    </span>")
                $('#down_from_top').slideDown().delay(3000).fadeOut()
            })
        } else {
            xhttp.open('POST', 'add_new_user_done.php', true)
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

            xhttp.send('ufname=' + ufname + '&uname=' + uname + '&upass=' + upass + '&uper=' + uper + '&ustatus=' + ustatus)
        }
    }
}
// ---------------- edit user ----------edit user--------------------edit user
function edit_user(url) {
    var fname = document.getElementById('fname').innerHTML

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $(document).ready(function() {
                $('.drop_value2').html(' ')
                $('#down_from_top2').fadeIn()
            })
            document.getElementById('edit_content').innerHTML = this.responseText
            document.getElementById('titley').innerHTML = 'عرض البيانات'
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    xhttp.open('POST', 'edit_user.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('id=' + url + '&fname=' + fname)
}
//  --------------- edit  user done
function edit_user_done(url) {
    var ufname = document.getElementById('ufname').value
    var ustatus = document.getElementById('ustatus').value
    var uper = document.getElementById('uper').value

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'done') {
                give_pages('show_all_user.php', ' عرض المستخدمين    ')
                document.getElementById('edit_content').innerHTML = ''
                document.getElementById('titley').innerHTML = 'عرض البيانات'

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>        تم تعديل بيانات بنجاح     </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }
    if (ufname.length < 10) {
        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'> يجب ان يكون الاسم 10 احرف فاكثر</span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()

            $('.drop_value2').html('')
            $('#down_from_top2').fadeIn()
        })
    } else {
        xhttp.open('POST', 'edit_user_done.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('ufname=' + ufname + '&ustatus=' + ustatus + '&uper=' + uper + '&post_id=' + url)
    }
}
// Acount settings-------------Acount settings-------------------Acount settings------------
function settings_done() {
    var dept
    var curpass = document.getElementById('curpass').value
    var newpass1 = document.getElementById('newpass1').value
    var newpass2 = document.getElementById('newpass2').value

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('titley').innerHTML = 'إعداد الحساب'

            if (this.responseText === 'done') {
                document.getElementById('titley').innerHTML = 'إعداد الحساب'

                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:green;'>   تمت العملية بنجاح  </span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()

                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()
                })
            } else if (this.responseText === 'done_0') {
                document.getElementById('titley').innerHTML = 'إعداد الحساب'
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:red;'>الرجاء كتابة كلمة المرور الحالية بصورة صحيحة</span>")
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    if (curpass === '' || newpass1 === '' || newpass2 === '') {
        document.getElementById('titley').innerHTML = 'إعدادات الحساب'

        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'>  رجاء ملئ كل الحقول  </span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()
        })
    } else {
        if (newpass1.length < 8 || newpass2.length < 8) {
            $(document).ready(function() {
                $('.drop_value').html("<span style='color:red;'> يجب ان تكون كلمة المرور اكثر من 7 احرف    </span>")
                $('#down_from_top').slideDown().delay(3000).fadeOut()
            })
        } else if (newpass1 != newpass2) {
            $(document).ready(function() {
                $('.drop_value').html("<span style='color:red;'> يجب تطابق كلمة المرور الجديدة وتاكيده</span>")
                $('#down_from_top').slideDown().delay(3000).fadeOut()
            })
        } else {
            xhttp.open('POST', 'settings_done.php', true)
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

            xhttp.send('curpass=' + curpass + '&newpass1=' + newpass1 + '&newpass2=' + newpass2)
        }
    }
}

// save session from name and fatora number created by random funtion in php
function save_name_fatora_no() {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $(document).ready(function() {
                $('.drop_value2').html(" ")
                $('#down_from_top2').fadeOut()
            })
            give_pages('shb.php', 'بيع الاصناف')
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }
    var name = document.getElementById('name').value
    if (name === '') {
        alert('رجاء ادخال اسم الزبون')
    } else {
        xhttp.open('POST', 'save_name_fatora_no.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('name=' + name)
    }
}

// shb function .............................................................................................................
/*function checketed(){
  if(document.getElementById('check').checked){
      document.getElementById("enterthemony").style.display='none'
      document.getElementById("puy").value='0'

  
}  }*/
var modal = document.getElementById('id01')

// When the user clicks anywhere outside of the modal, close it
function cel(url) {
    'use strict'
    // var x = document.getElementById(name).innerHTML
    var name = document.getElementById('name_' + url).innerHTML
    var type = document.getElementById('type_' + url).innerHTML
    var price = document.getElementById('price_' + url).innerHTML

    var mymontj = name + '     ' + type + '     ' + price + '     '
    document.getElementById('cels').innerHTML = '    الصنف  :    ' + name + '      ' + type

    document.getElementById('id01').style.display = 'block'
    document.getElementById('shb').onmousedown = function() {
        this.addEventListener('mousedown', shb_montj(url, mymontj))
    }
}

var xml

function xmlhttp() {
    if (window.XMLHttpRequest) {
        xml = new XMLHttpRequest()
    } else {
        xml = new ActiveXObject('Microsoft.XMLHTTP')
    }
    return xml
} // ////////////////////////////////////////////////////////////

function shb_montj(url, mymontj) {
    if (document.getElementById('amount').value == '') {
        alert('رجاء ادخال الكمية  ')
    } else {
        xmlhttp()
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $(document).ready(function() {
                    $('.drop_value2').html(" ")
                    $('#down_from_top2').fadeOut()
                })
                document.getElementById('amount').value = ''

                var res = xml.responseText
                if (res === 'full') {
                    alert('كمية المنتج المسحوبة اكبر من الموجودة في المخز ن')
                } else if (res === 'done') {
                    give_pages('shb.php', 'بيع الاصناف')
                    give_added_fatora()
                }
            } else if (this.readyState < 4 && this.readyState > 0) {
                $(document).ready(function() {
                    $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                    $('#down_from_top2').fadeIn()
                })

            }
        }
        var amount = document.getElementById('amount').value
        var zbon_name = document.getElementById('zbon_name').value

        if (zbon_name === '') {
            alert('رجاء ادخال  اسم الزبون اولآ')
        } else {
            xml.open('POST', 'add_to_fatora.php', true)
            xml.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            xml.send('url=' + url + '&amount=' + amount)
        }
    }
}
// ////end shb functions

// give added fatora
function give_added_fatora() {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('added_fatora').innerHTML = this.responseText
            $(document).ready(function() {
                $('.drop_value2').html(' ')
                $('#down_from_top2').fadeOut()
            })
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }

    xhttp.open('POST', 'added_fatora.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send()
}
// delete from list and restore values to store table
function deleter(oid, oqty, sno) {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'done') {
                give_pages('shb.php', 'بيع الاصناف')
                give_added_fatora()
                $(document).ready(function() {
                    $('.drop_value2').html(' ')
                    $('#down_from_top2').fadeOut()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }

    xhttp.open('POST', 'deleter_from_fatora.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('oid=' + oid + '&oqty=' + oqty + '&sno=' + sno)
}

// fatora search
function fatora_search() {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('contian').innerHTML = this.responseText
            if (this.responseText === '') {
                give_pages('shb.php', 'بيع الاصناف')
            }
            $(document).ready(function() {
                $('.drop_value2').html(' ')
                $('#down_from_top2').fadeOut()
            })
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }
    var url = document.getElementById('entered').value
    xhttp.open('POST', 'shb_search.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('url=' + url)
}
// dafy function
function dafy() {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $(document).ready(function() {
                $('.drop_value2').html(' ')
                $('#down_from_top2').fadeOut()
            })

            document.getElementById('added_fatora').innerHTML = this.responseText
            printery('added_fatora');
            unset_session();
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }
    var url = document.getElementById('sumer').innerHTML

    if (url <= 0) {
        alert('لا يوجد اي عملية')
    } else {
        xhttp.open('POST', 'dafy_money.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhttp.send('sumer=' + url)
    }
}
///printer function 
function printery(url) {
    var body = document.body.innerHTML;
    var added_title = document.getElementById('report_title').innerHTML;
    var added_fatora = document.getElementById(url).innerHTML;

    document.body.innerHTML = added_title + added_fatora;
    window.print();
    document.body.innerHTML = body;

}
//unset and delete the session name and patora numbe
function unset_session() {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $(document).ready(function() {
                $('.drop_value2').html(" ")
                $('#down_from_top2').fadeOut()
            })
            give_pages('shb.php', 'بيع الاصناف')
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }
    xhttp.open('POST', 'unset_session.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send()
}
// this tybaa for print fatora after give the detials
function tybaa(url) {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("print_content").innerHTML = this.responseText;
            printery('print_content');
            document.getElementById("print_content").innerHTML = " ";
            $(document).ready(function() {
                $('.drop_value2').html(" ")
                $('#down_from_top2').fadeOut();
            });
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            });
        }
    }
    xhttp.open('POST', 'tybaa.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send("fatora_no=" + url);
}
// edit fatora edit fatora edit fatora edit fatora edit fatora edit f----------------------------
function edit_fatora(url) {
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('edit_content').innerHTML = this.responseText
            document.getElementById('titley').innerHTML = 'تعديل بيانات   ';
            $(document).ready(function() {
                $('.drop_value2').html(" ")
                $('#down_from_top2').fadeOut()
            })
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }

    xhttp.open('POST', 'edit_fatora.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('oid= ' + url);

}
// edit fatora done
function edit_fatora_done(url) {
    var oitem = document.getElementById("oitem").value;

    var oqty = document.getElementById("oqty").value;
    var fatora_no = document.getElementById("fatora_no").value;
    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            $(document).ready(function() {
                $('.drop_value2').html(" ")
                $('#down_from_top2').fadeOut()
            })
            if (this.responseText === "notfound") {
                alert("المنتج الذي ادخل لا يوجد في المخزن");
            } else if (this.responseText === "big") {
                alert("الكمية المطلوبة اكبر من الموجودة في المخزن");
            } else {
                document.getElementById('edit_content').innerHTML = this.responseText;
                printery('edit_content');

                give_pages("show_all_fatora.php", "عرض الفواتير");

            }

        } else {

            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeIn()
            })
        }
    }

    xhttp.open('POST', 'edit_fatora_done.php', true)
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhttp.send('oid= ' + url + "&oitem=" + oitem + "&oqty=" + oqty + "&fatora_no=" + fatora_no);

}

// export report------------export report-------------------export report------------export report
function report_export() {
    var sch_option = document.getElementById("sch_option").value;
    var sch_text = document.getElementById("sch_text").value;
    var sch_date1 = document.getElementById("sch_date1").value;
    var sch_date2 = document.getElementById("sch_date2").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        $(".col-lg-3").hide();
        $("#col_large").addClass("col-lg-12");
        $("#col_large").addClass("col-xl-12");
        $("#accordionSidebar").addClass("toggled");

        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === "no_data" || this.responseText === "enter_text") {
                document.getElementById('report_title').innerHTML = "";
                document.getElementById('titley').innerHTML = "عرض تقرير صادر";
                document.getElementById('report_content').innerHTML = "لا توجد نتيجة";


                $(document).ready(function() {

                    $(".drop_value2").html(" ");
                    $("#down_from_top2").fadeIn();

                });
            } else {

                document.getElementById('report_title').innerHTML = '<center><img src="images/report_title.png" width="80%"/></center> <br>';
                document.getElementById('titley').innerHTML = "";
                document.getElementById('report_content').innerHTML = this.responseText;
                $(document).ready(function() {

                    $(".drop_value2").html(" ");
                    $("#down_from_top2").fadeIn();

                });

                $(document).ready(function() {

                    $(".col-lg-3").hide();
                    $("#col_large").addClass("col-lg-12");
                    $("#col_large").addClass("col-xl-12");
                    $("#accordionSidebar").addClass("toggled");


                });
            }

        } else {
            $(document).ready(function() {

                $(".drop_value2").html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>");
                $("#down_from_top2").fadeIn();

            });
        }
    };

    if (sch_option != "between" && sch_text === "") {
        alert("يجب كتابة نص للبحث ");
    } else {
        xhttp.open("POST", "report_done_export.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("sch_option=" + sch_option + "&sch_text=" + sch_text + "&sch_date1=" + sch_date1 + "&sch_date2=" + sch_date2);
    }

}

function between_date() {
    var sch_option = document.getElementById("sch_option").value;

    if (sch_option === "between") {
        //document.getElementById('bet').style.display='block';
        $(document).ready(function() {


            $("#bet").slideDown();

        });
    } else {
        $(document).ready(function() {


            $("#bet").slideUp();

        });
    }
}

//add new  tored  ------------------add new  tored ------------------------------add new  tored  
function add_tored() {
    var dept;
    var tamount = document.getElementById("tamount").value;
    var tcomm = document.getElementById("tcomm").value;
    var tdate = document.getElementById("tdate").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById('titley').innerHTML = "إضافة توريد  جديد";
            if (this.responseText === "done") {
                document.getElementById('titley').innerHTML = "إضافة توريد  جديد";

                $(document).ready(function() {

                    $(".drop_value").html("<span style='color:green;'>   تم اضافة المبلغ  بنجاح</span>");
                    $("#down_from_top").slideDown().delay(3000).fadeOut();

                    $(".drop_value2").html("");
                    $("#down_from_top2").fadeIn();

                });
            } else if (this.responseText === "found") {
                document.getElementById('titley').innerHTML = "إضافة توريد  جديد";
                $(document).ready(function() {

                    $(".drop_value").html("<span style='color:green;'>  تم اضافة المبلغ مسبقا</span>");
                    $("#down_from_top").slideDown().delay(3000).fadeOut();



                });
            }

        } else {
            $(document).ready(function() {

                $(".drop_value2").html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>");
                $("#down_from_top2").fadeOut();

            });
        }
    }

    if (tamount === "" || tcomm === "" || tdate === "") {

        document.getElementById('titley').innerHTML = "إضافة توريد  جديد";

        $(document).ready(function() {

            $(".drop_value").html("<span style='color:red;'>  رجاء ملئ كل الحقول  </span>");
            $("#down_from_top").slideDown().delay(3000).fadeOut();

        });
    } else {

        xhttp.open("POST", "add_new_tored_done.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send("tamount=" + tamount + "&tcomm=" + tcomm + "&tdate=" + tdate);



    }
}
// ---------------- edit totred ----------edit totred--------------------edit totred
function edit_tored(url) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            $(document).ready(function() {

                $(".drop_value2").html(" ");
                $("#down_from_top2").fadeIn();

            });
            document.getElementById('edit_content').innerHTML = this.responseText;
            document.getElementById('titley').innerHTML = "عرض البيانات";
        } else {
            $(document).ready(function() {

                $(".drop_value2").html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>");
                $("#down_from_top2").fadeOut();

            });
        }
    };

    xhttp.open("POST", "edit_tored.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + url);
}
//  --------------- edit  tored done --------edit  tored done-------edit  tored done----edit  tored done
function edit_tored_done(url) {

    var tamount = document.getElementById("tamount").value;
    var tcomm = document.getElementById("tcomm").value;
    var tdate = document.getElementById("tdate").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            if (this.responseText === "done") {
                give_pages("show_all_tored.php", " عرض توريد    ");
                document.getElementById('edit_content').innerHTML = "";
                document.getElementById('titley').innerHTML = "عرض البيانات";

                $(document).ready(function() {

                    $(".drop_value").html("<span style='color:green;'>        تم تعديل بيانات بنجاح     </span>");
                    $("#down_from_top").slideDown().delay(3000).fadeOut();

                    $(".drop_value2").html("");
                    $("#down_from_top2").fadeIn();

                });
            }

        } else {
            $(document).ready(function() {

                $(".drop_value2").html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>");
                $("#down_from_top2").fadeOut();

            });
        }
    };
    if (tamount === "" || tcomm === "" || tdate === "") {
        $(document).ready(function() {

            $(".drop_value").html("<span style='color:red;'>الرجاء ملئ كل الحقول</span>");
            $("#down_from_top").slideDown().delay(3000).fadeOut();

            $(".drop_value2").html("");
            $("#down_from_top2").fadeIn();

        });
    } else {
        xhttp.open("POST", "edit_tored_done.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("tamount=" + tamount + "&tcomm=" + tcomm + "&tdate=" + tdate + "&post_id=" + url);
    }
}

// check Permission --------------check Permission---------------------check Permission----------------  
function check_permission2(url) {
     var result;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            result = this.responseText;
          //  alert(result);
            return result;
        }}
        xhttp.open("POST", "check_permission.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("url=" + url);
    
}
//   add multi export------------------------add multi export--------------------add multi export-
// add new  saderat
function add_multi_exp(recno) {
    var rname = document.getElementById('rname'+recno).value
    var cno = document.getElementById('cno'+recno).value
    var dname = document.getElementById('dname'+recno).value
    var pname = document.getElementById('pname'+recno).value
    var pqty = document.getElementById('pqty'+recno).value
    var bcost = document.getElementById('bcost'+recno).value
    var dcost = document.getElementById('dcost'+recno).value
    var lcost = document.getElementById('lcost'+recno).value
    var manifist = document.getElementById('manifist'+recno).value
    var ldate = document.getElementById('ldate'+recno).value
    var comm = document.getElementById('comm'+recno).value

    var xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === 'done') {
                document.getElementById('titley').innerHTML = 'إضافة صادر  جديد'

                $(document).ready(function() {
                    $('.drop_value2').html('')
                    $('#down_from_top2').fadeIn()

                    $('.drop_value').html("<span style='color:red;'>  تم اضافة منتج  " + pname + ' بنجاح  </span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            } else if (this.responseText === 'found') {
                document.getElementById('titley').innerHTML = 'إضافة صادر  جديد'
                $(document).ready(function() {
                    $('.drop_value').html("<span style='color:red;'>    عذرآ تم إضافة منتج " + pname + '  مسبقآ بتاريخ ' + ldate + '  <br> رجاء مراجعة الصادرات</span>')
                    $('#down_from_top').slideDown().delay(3000).fadeOut()
                })
            }
        } else {
            $(document).ready(function() {
                $('.drop_value2').html("<span style='color:red;'>  <img src='img/ajax-loader.gif'/> </span>")
                $('#down_from_top2').fadeOut()
            })
        }
    }

    if (rname === '' || cno === '' || pname === '' || dname === '' || ldate === '') {
        document.getElementById('titley').innerHTML = 'إضافة صادر  جديد'

        $(document).ready(function() {
            $('.drop_value').html("<span style='color:red;'>  رجاء ملئ كل الحقول  </span>")
            $('#down_from_top').slideDown().delay(3000).fadeOut()
        })
    } else {
        xhttp.open('POST', 'exports_insert_done.php', true)
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

        xhttp.send('rname=' + rname + '&cno=' + cno + '&dname=' + dname + '&pname=' + pname + '&pqty=' + pqty + '&bcost=' + bcost + '&dcost=' + dcost + '&lcost=' + lcost + '&manifist=' + manifist + '&ldate=' + ldate + '&comm=' + comm);
    }
}

