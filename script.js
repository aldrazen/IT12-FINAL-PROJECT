function redirectToShop() {
  window.location.href = '../customer/customerShop.php';
}
function myBag(){
  window.location.href='../customer/customerBag.php';
}
function customerUpdate(){
  window.location.href='../customer/customerUpdate.php';
}
function customerHistory(){
  window.location.href='../customer/customerHistory.php';
}
function login(){
  window.location.href='../customer/customerLogin.php';
}
function adminLogin(){
  window.location.href='../admin/adminLogin.php';
}
function register(){
  window.location.href='../customer/customerRegister.php';
}
function goToHome(){
   window.location.href='../Main/homepage.php';
}

let selectedSize = null;

function selectSize(sizeID) {
  selectedSize = sizeID;
}
function addToCart(productID) {
  if (selectedSize === null) {
    alert('Please select a size before adding to the bag.');
  } else {
    window.location.href = `../customer-database/addToCartDB.php?add_to_cart=${productID}&size=${selectedSize}`;
  }
}

function loadProductPage() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "addProductPage.php", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      document.getElementById("main").innerHTML = xhr.responseText;
    }
  };
  xhr.send();
}


