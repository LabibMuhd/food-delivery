<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
<body>

  <section class="insert_products-section">
    <div class="container">
      <h1 class="heading-secondary form-header">Insert Products</h1>

      <form actions="" method="post" enctype="multipart/form-data">
        <div class="product-form">
          <label for="product_title" class="form-label">Meal title</label>
          <input type="text" name="product_title"  id="product_title" class="input-form" 
          placeholder="Enter Meal Title" autocomplete="off" required>
        </div>
        
        <div class="product-form">
          <label for="product_description" class="form-label">Description</label>
          <input type="text" name="product_description"  id="product_description" class="input-form" 
          placeholder="Enter Meal Description" autocomplete="off" required>
        </div>

        <div class="product-form">
          <label for="product_keyword" class="form-label">Keywords</label>
          <input type="text" name="product_keyword"  id="product_keyword" class="input-form" 
          placeholder="Enter Meal Keywords" autocomplete="off" required>
        </div>

        
        <div class="row-attributes" id="product_attr_box">
          <div class="product-attributes" id="attr_1">
            <div class="product-form">
              <label for="product_price" class="form-label">Price</label>
              <input type="text" name="product_price[]"  id="product_price" class="attr-form" 
              placeholder="Price" autocomplete="off" required>
            </div>
            <div class="product-form">
              <label for="product_qty" class="form-label">Quantity</label>
              <input type="text" name="product_qty[]"  id="product_qty" class="attr-form" 
              placeholder="Qty" autocomplete="off" required>
            </div>
            <div class="product-form">
              <label for='button' class="form-label"></label>
              <button id="" type="button" class="btn btn--form" onclick="add_more_attr()">
                <span id="payment-button-amount">Add More</span>
              </button>            
            </div>

            <input type="hidden" name="attr_id[]" />            
          </div>
         
        </div>
	
        <!-- product image -->
        <div class="product-form">
          <label for="product_image" class="form-label">Meal image</label>
          <input type="file" name="product_image"  id="product_image" class="input-form" 
           required>
        </div>
 
        <!-- submit button -->
        <div class="submit-btn">
          <input type="submit" class="btn btn--cat" name="insert_product" value="Insert Product">
        </div>
      </form>
    </div>
  </section>
   
<script>
  let attr_count=1;
			function add_more_attr(){
        attr_count++;
				
				let size_html=$('#attr_1 #size').html();
				// size_html=size_html.replace('selected','');
				
				let color_html=$('#attr_1 #color').html();
				// color_html=color_html.replace('selected','');
        let html = '<div class="product-attributes" id="attr_'+attr_count+'">\n';
            html += '<div class="product-form">\n';
            html += '<label for="product_price" class="form-label">Price</label>\n';
            html += '<input type="text" name="product_price[]" id="product_price" class="input-form" placeholder="Price" autocomplete="off" required>\n';
            html += '</div>\n';
            html += '<div class="product-form">\n';
            html += '<label for="product_qty" class="form-label">Quantity</label>\n';
            html += '<input type="text" name="product_qty[]" id="product_qty" class="input-form" placeholder="Qty" autocomplete="off" required>\n';
            html += '</div>\n';
            html += '<div class="product-form">\n';
            html += '<label for="product_size" class="form-label">Size</label>\n';
            html += '<input type = "text" name="product_size[]" id="size" class=\'input-form\' placeholder="size" autocomplete="off" required>\n';
            // html += '"'+size_html+'"\n';
            html += '</div>\n';
            html += '<div class="product-form">\n';
            html += '<label for="product_color" class="form-label">Color</label>\n';
            html += '<input type = "text" name="product_color[]" id="color" class=\'input-form\' placeholder="color" autocomplete="off" required>\n';
            // html += '"'+color_html+'"\n';
            html += '</div>\n';
            html += '<div class="product-form">\n';
            html += '<label for=\'button\' class="form-label"></label>\n';
            html += '<button id="" type="button" class="btn btn--add-more color-red" onclick=remove_attr("'+attr_count+'")>\n';
            html += '<span id="payment-button-amount">Remove</span>\n'; 
            html += '</button>\n';
            html += '</div>\n';
            html += '<input type="hidden" name="attr_id[]" />\n';
            html += '</div>';
				$('#product_attr_box').append(html);
			}
			
			function remove_attr(attr_count){
        $('#attr_'+attr_count).remove();
        
        // jQuery.ajax({
				// 	url:'remove_attributes.php',
				// 	data:'id='+id,
				// 	type:'post',
				// 	success:function(result){
				// 	}
				// });
			}
		 </script>
</body>
</html>