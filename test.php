<?sleep(1)?>
<style type="text/css" media="screen">
	.delete-form{
		
	}
	.delete-form label{
		display:block;
		font-size:14px;
		color:#666;
		margin:8px 0 6px 0;
	}
	.delete-form .field-wrapper{
		background:#DDD;
		padding:6px;
		margin:4px 0;
	}
	.delete-form .field-wrapper input{
		width:300px;
		padding:4px;
		font-size:16px;
		color:#666;
		border:1px solid #AAA;
	}
	.delete-form span{
		font-size:14px;
		color:#D44;
	}
</style>
  <body>
  <button onclick="mysql()"> here </button>
  <!-------------------------------------------------------------------------
  1) Create some html content that can be accessed by jquery
  -------------------------------------------------------------------------->
  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="output">this element will be accessed by jquery and this text replaced</div>

  <script id="source" language="javascript" type="text/javascript">

  $(function mysql () 
  {
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({                                      
      url: 'api.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
        var id = data[0];              //get id
        var vname = data[1];           //get name
        //--------------------------------------------------------------------
        // 3) Update html content
        //--------------------------------------------------------------------
        $('#output').html("<b>id: </b>"+id+"<b> name: </b>"+vname); //Set output element html
        //recommend reading up on jquery selectors they are awesome 
        // http://api.jquery.com/category/selectors/
      } 
    });
  }); 

  </script>
  </body>
</html>