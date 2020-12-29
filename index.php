
<html>
 <style>
    html {
      font-family: sans-serif;
    }

    form {
      width: 600px;
      background: #ccc;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid black;
    }

    form ol {
      padding-left: 0;
    }

    form li, div > p {
      background: #eee;
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      list-style-type: none;
      border: 1px solid black;
    }


    form p {
      line-height: 32px;
      padding-left: 10px;
    }

    form label, form button {
      background-color: #7F9CCB;
      padding: 5px 10px;
      border-radius: 5px;
      border: 1px ridge black;
      font-size: 0.8rem;
      height: auto;
    }

    form label:hover, form button:hover {
      background-color: #2D5BA3;
      color: white;
    }

    form label:active, form button:active {
      background-color: #0D3F8F;
      color: white;
    }
  </style>
   <body>
      <center>
      <form action="" method="POST" enctype="multipart/form-data">
		<div>
		 <?php
			if(isset($_FILES['image'])){
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];
				$tmp = explode('.',$_FILES['image']['name']);
				$file_ext = strtolower(end($tmp));
	 
      
				$extensions= array("jpeg","jpg","png");
      
			if(in_array($file_ext,$extensions)=== false){
				$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}
      
			if($file_size > 2097152){
				$errors[]='File size must be excately 2 MB';
			}
      
			if(empty($errors)==true){
				move_uploaded_file($file_tmp,"images/".$file_name);
			echo "";
			}else{
				print_r($errors);
				}
			echo "
				<div>
				<center>
					<img src='images/$file_name' width='300' height='250' alt=''>
				</center>	
				</div>
				";
	  
			}
		?> <p><p>
		 <label for="image">Select your image</label>
         <input type="file" name="image" id="image"/>
         <input type="submit" value="Skin Lesion Analyzer" id="submit"/>
		 </div>
      </form>
	  <form>
		 <div>
		 <center><p><p><p>RESULTS<p></center>
		  Name:<p>
		 </div> 
		 </form>
      </center>
	  <script>
	  const input = document.querySelector('input');
	  input.style.opacity = 0;
	  </script>
   </body>
</html>