<?php
for ($i=0; $i < 10; $i++) { 

?>
<style>
* {
  box-sizing: border-box;
}
html, body {
  height: 100%;
  box-sizing: inherit;
  background: #f5f5f5;
  color: #777;
  font-family: 'Open Sans', sans-serif;
  font-size: 18px;
}

p {
  text-align: center;
}

#hero--buttons {
  margin: 0px auto; 
  text-align: center;
}

# <?php $i;?> {
  width: 250px;
  height: 50px;
  background: #333;
  border: 0;
  display: inline-block;
  margin-right: 10px;
  color: #fff;

}

#refer-btn {
  width: 250px;
  height: 50px;
  background: #d8bc5a;
  border: 0;
  display: inline-block;
  color: #fff;
}

#gform_7, #gform_63 {
  display: none;
}

#gform_7 {
  margin: 0 auto;
  width: 300px;
  padding: 10px;
}

#gform_63 {
  margin: 0 auto;
  width: 300px;
  padding: 10px;
}

.i {
  display:flex;  
}

.btn{
  border-raduis:50%;
  width:25%;

}

</style>
<div class="bhero--row">
  <div class="hbero--wrapper">

         <div id="hero--buttons">
           <button id="<?php echo $i ;?>">On</button>
   
         </div>
    
            <form class="i" id="<?php echo $i + 10;?>">
              <input type="date" class='btn'>
              <input type="date" class='btn'>
              </d>
  </form>
</div>
<?php } ?>
<script>
    
for(let i = 0 ; i<10 ; i++){
let borrower = document.getElementById(i);
let borrowerShow = document.getElementById(i+10);

borrower.addEventListener('click', function() {
    if(borrowerShow.style.display == 'block') {
      borrowerShow.style.display = 'none';
      
    }else {
      borrowerShow.style.display = 'block';
      brokerShow.style.display = 'none';
    }
  }, false);
}


</script>
