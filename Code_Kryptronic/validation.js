//Signup form
function signupform(event) {

  var elements = event.currentTarget;
  var a = elements[0].value;
  var b = elements[1].value;
  var c = elements[2].value;
  var d = elements[3].value;
  var e = elements[4].value;
  var f = elements[5].value;

  var result = true;

  var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  var uname_v = /^[a-zA-Z0-9_-]+$/;
  var pswd_v = /^(\S*)?\d+(\S*)?$/;


  if (a==null || a==""||!uname_v.test(a))
      {
   document.getElementById("first_msg").innerHTML="First name cannot contain spaces!";
         result = false;
      }
  if (b==null || b==""||!uname_v.test(b))
      {
     document.getElementById("last_msg").innerHTML="Last name cannot contain spaces!";
        result = false;
          }

  if (c==null || c==""||!email_v.test(c))
      {
  	   document.getElementById("email_msg").innerHTML="Email is empty or invalid(example: cs215@uregina.ca)";
         result = false;
        }

  if (d==null || d==""||!pswd_v.test(d))
      {
       document.getElementById("pswd_msg").innerHTML="Please Enter the Password correctly(8 characters long and at least one non-letter)";
         result = false;
        }

  if (e != d)
      {
     document.getElementById("pswdr_msg").innerHTML="The confirm password should be the same as the password above";
         result = false;
        }

  if(result == false )
      {
        event.preventDefault();
      }
}



//reset form
/*
function ResetForm(){
   document.getElementById("email_msg").innerHTML ="";

	document.getElementById("uname_msg").innerHTML ="";
	document.getElementById("pswd_msg").innerHTML ="";

	document.getElementById("pswdr_msg").innerHTML ="";

  */
//login form (homepage)
function loginform(event) {


  var elements = event.currentTarget;

  var a = elements[0].value;
  var b = elements[1].value;

  var result = true;

  var pswd_v = /^(\S*)?\d+(\S*)?$/;
    var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

    if (a==null || a==""||!email_v.test(a))
        {
    	   document.getElementById("email_msg").innerHTML="Email is empty or invalid!";
           result = false;
          }

  if (b==null || b==""||!pswd_v.test(b))
      {
     document.getElementById("pswd_msg").innerHTML="Password incorrect";
         result = false;
          }

  if(result == false )
      {
        event.preventDefault();
      }

  }


//admin product regestration
function registerprod(event){
fileValidation();
  var elements = event.currentTarget;
  var a = elements[0].value;
  var b = elements[1].value;
  var c = elements[2].value;
  var d = elements[3].value;

document.getElementById("prod_title").innerHTML="";
document.getElementById("prod_desc").innerHTML="";
document.getElementById("prod_quantity").innerHTML="";
document.getElementById("prod_price").innerHTML="";


  var result = true;
if(a==null|| a=="")
{
  document.getElementById("prod_title").innerHTML="Select a Product!";
      result = false;
}

if(b==null|| b.length<"150")
{
  document.getElementById("prod_desc").innerHTML="Product Description Is Required!";
      result = false;
}

if(c<"1"|| c>"99")
{
  document.getElementById("prod_quantity").innerHTML="Enter valid Quantity!";
      result = false;
}

if(d==null|| d=="")
{
  document.getElementById("prod_price").innerHTML="Product Price Is Required!";
      result = false;
}


if(result == false)
  {
    event.preventDefault();
  }


}

function charcountupdate(str) {

  var lng = str.length;
  document.getElementById("charcount").innerHTML = lng + 'out of 150 characters';
}

//Remove btn & add to cart btn & delete btn (cartpage,product page, add or remove catagory)
function remove(){
remove_btn();
quant();
calculate_total();
}

//check quantity input
function quant(){
  let a = document.getElementsByClassName("quantity_prod");

  Array.prototype.forEach.call(a, item=>{
    item.addEventListener("change", check)
  });
}

function check(ev){
  let el = ev.currentTarget.value;
  if(el < 1 || el > 99){
    alert("Invalid input!");
    ev.currentTarget.value=1;
  }
  else{
    calculate_total();
  }
}

function calculate_total() {
    let totalDiv = document.getElementById("total");
    let allPricesArray = document.getElementsByClassName("cost");
    let q = document.getElementsByClassName("quantity_prod");
    let allPrices = 0;

    //need to convert the HTML Array none in Array
    Array.prototype.forEach.call(allPricesArray, (item, i) => {
        allPrices += (parseFloat(item.innerText.replace("$", "")))*parseInt(q[i].value);
    });

    let gst = allPrices * 0.05;
    let pst = allPrices * 0.06;
    let shipping = 4.00;
    let total = allPrices+gst+pst+shipping;

    let html = "<table><tbody><tr><td>Sub-Total</td><td>$"+allPrices.toFixed(2)+"</td></tr>";
    html += "<tr><td>GST</td><td>$ " +gst.toFixed(2)+"</td></tr>";
    html += "<tr><td>PST SK</td><td>$ " +pst.toFixed(2)+"</td></tr>";
    html += "<tr><td>Shipping</td><td>$ " +shipping.toFixed(2)+"</td></tr>";
    html += "<tr><td>Total</td><td>$ " +total.toFixed(2)+"</td></tr>";
    html += "</tbody></table>";

    totalDiv.innerHTML = html;
}

function remove_btn(){
  let a,b,c;
  let d = document.querySelectorAll("button");
  Array.prototype.forEach.call(d, item=>{
    item.addEventListener("click", function(ev){
      var x = ev.currentTarget.getAttributeNode("data-id").value;
      if(a = document.getElementById("pcpage")){
        alert("Removed item: " + x);
      }
      if(b = document.getElementById("catagory")){
        alert("Removed catagory: " + x);
      }
      if(c = document.getElementById("wish_list")){
        alert("Product added: " + x);
      }
    });
  });
}

//Rproduct file upload check
function fileValidation(){
  var fileInput = document.getElementById("file")
  var filePath = fileInput.value;
var allowedExtenstions = /(\.jpg|\.png)$/i;
if(!allowedExtenstions.exec(filePath)){
  alert("Please upload jpg or png");
  fileInput.value ='';
  return false;

}
}




function ajax_post() {

       // create a variable we need to send to our PHP file
       var letter = document.getElementById("input_letter").value;
       //create XMLHttpRequest object
       var  xmlhttp = new XMLHttpRequest();
       // access the onreadystatechange event for the XMLHttpRequest object
           xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               var to_show;
               var results = JSON.parse(this.responseText)
               if (results.length > 0)
               {
                    to_show = "<table border='1px'>";
                    to_show += "<tr>";
                    to_show += "<th>"; to_show += "prod_name"; to_show += "</th>";
                    to_show += "<th>"; to_show += "prod_location"; to_show += "</th>";
                    to_show += "<th>"; to_show += "price"; to_show += "</th>";
                    to_show += "</tr>";
                    for (var i = 0; i < results.length; i++)
                    {
                        var json_result = results[i];
                        to_show += "<tr>";
			            to_show += "<td>"; to_show += json_result[1]; to_show += "</td>";
                        to_show += "<td>"; to_show += json_result[2]; to_show += "</td>";
                        to_show += "<td>"; to_show += json_result[3]; to_show += "</th>";
                        to_show += "</tr>";
                    }
                    to_show += "</table>";
               } else {
                    to_show = "There is no user name starts with '"+letter+"'";
               }

                document.getElementById("display_records").innerHTML = to_show;

            }//if

       } //function()
         //send the data to PHP now and wait for response
         //to update the display_records in div
         //actually execute the request
         xmlhttp.open("POST", "homepage.php", true);
         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlhttp.send("q="+ letter);

}
