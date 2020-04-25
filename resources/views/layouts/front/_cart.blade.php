<div class="mix">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div>  
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="fa fa-shopping-bag"></span><span class="number-shopoping-cart">0</span> - Product in Cart <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-cart" role="menu">
                  <div class="form-group" id="cart_table" >
                      
                  </div>
                  <div class="form-group" style="margin-left: 4px;">
                    <p style="color: #fff"> Total Price:<span class="total_price"></span></p>  
                   
                    <a href="{{route('_checkout')}}">
                      <button class="btn btn-primary btn-sm center">Checkout</button>
                    </a>

                  </div>
              </ul>
            </li>
        </ul>
    </div>
  </div>
</nav>
</div>

<style>
.bigicon {    
    color:white;
}
ul.dropdown-cart{
    min-width:250px;
    border: 2px solid #343434;
    padding: 2px;
    margin: 7px;
    margin-top: 11px;
}
ul.dropdown-cart li .item{
    display:block;
    padding:3px 10px;
    margin: 3px 0;
    
}
ul.dropdown-cart li .item:hover{
    background-color:#c3c5c5;
    
}
ul.dropdown-cart li .item:after{
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

ul.dropdown-cart li .item-left{
    float:left;
}
ul.dropdown-cart li .item-left img,
ul.dropdown-cart li .item-left span.item-info{
    float:left;
}
ul.dropdown-cart li .item-left span.item-info{
    margin-left:10px;   
}
ul.dropdown-cart li .item-left span.item-info span{
    display:block;
}
ul.dropdown-cart li .item-right{
    float:right;
}
ul.dropdown-cart li .item-right button{
    margin-top:14px;
}   
</style>
