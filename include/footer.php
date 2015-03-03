     <script src="js/jquery-2.1.3.min.js"></script>
     <script>$(function(){$("[data-toggle='tooltip']").tooltip();});</script>
     <script>$(function(){$("[data-toggle='popoverSkill']").popover({
        container: 'body',
        html:true,
        trigger: 'hover',
        placement: 'top'}                                                       
        );});
    </script>
     <script>
        $('img#rateup').on('click', function(){
           var rating = $('img#rateup').attr('rating');
           var userId = $('img#rateup').attr('userId');
           var champId = $('img#rateup').attr('champId');
           //alert(rating); 
           $.post('updateHistory.php', {rating: rating, userId:userId, champId: champId}, function(data){
               var ratings=data.split(",");

               document.getElementById("likes").innerHTML = ratings[0];
               document.getElementById("dislikes").innerHTML = ratings[1];
           });
        });
     </script>
          <script>
        $('img#ratedown').on('click', function(){
           var rating = $('img#ratedown').attr('rating');
           var userId = $('img#rateup').attr('userId');
           var champId = $('img#rateup').attr('champId');
           //alert(rating); 
           $.post('updateHistory.php', {rating: rating, userId:userId, champId: champId}, function(data){
               var ratings=data.split(",");

               document.getElementById("likes").innerHTML = ratings[0];
               document.getElementById("dislikes").innerHTML = ratings[1];

           });
        });
     </script>
          <script>
        $('img#login').on('click', function(){
          alert("You must be logged in to vote! Luckily for you, registration is FREE!");
        });
     </script>
          
    <script>
        var skill=[];
        skill['p']=0;
        skill['q']=0;
        skill['w']=0;
        skill['e']=0;
        skill['r']=0;
        var counter=1;
        var limit=5;
        function addRow(letter){
             if (skill[letter]== limit)  {
                 alert("Sorry! You may only have up to 5 properties!");
            }
            else{
                var table = document.getElementById("myTable"+letter);
                var numRows= table.rows.length+1;
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                row.setAttribute("id",letter+numRows);
                cell1.innerHTML = '<input id="'+letter+'up'+numRows+'" type="hidden" name="'+letter+'up[]" value="0"><input type="text" class="form-control" name="'+letter+'props[]" placeholder="Type eg(Active, Slow, etc)">';
                cell2.innerHTML = '<input type="text" class="form-control" name="'+letter+'vals[]" placeholder="Values eg(10/30/50)+20% AP">';
                cell3.innerHTML = '<span class="btn btn-danger" onclick="removeProp('+numRows+',\''+letter+'\')">x</span>';
                skill[letter]++;
            }
        }
    </script>

 <script type="text/javascript">
$(function() {
    $("#uploadP").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            var image = new Image();
            
            reader.onloadend = function(){ // set image data as background of div

                    image.src=this.result;
                   // if (image.width==64 && image.height==64) {
                        document.getElementById("modalp").src=this.result;
                        document.getElementById("skillp").src=this.result;
                   // }
                   // else{
                   //     alert("Skill icons must be 64x64 in dimension");
                   // }
 
            }
        }
    });
});
</script>
 
  <script type="text/javascript">
$(function() {
    $("#uploadQ").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            var image = new Image();
            
            reader.onloadend = function(){ // set image data as background of div

                    image.src=this.result;
                   // if (image.width==64 && image.height==64) {
                        document.getElementById("modalq").src=this.result;
                        document.getElementById("skillq").src=this.result;
                   // }
                  //  else{
                   //     alert("Skill icons must be 64x64 in dimension");
                   // }
 
            }
        }
    });
});
</script>
  
   <script type="text/javascript">
$(function() {
    $("#uploadW").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            var image = new Image();
            
            reader.onloadend = function(){ // set image data as background of div

                    image.src=this.result;
                  //  if (image.width==64 && image.height==64) {
                        document.getElementById("modalw").src=this.result;
                        document.getElementById("skillw").src=this.result;
                   // }
                  //  else{
                   //     alert("Skill icons must be 64x64 in dimension");
                   // }
 
            }
        }
    });
});
</script>
   
<script type="text/javascript">
$(function() {
    $("#uploadE").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            var image = new Image();
            
            reader.onloadend = function(){ // set image data as background of div

                    image.src=this.result;
                   // if (image.width==64 && image.height==64) {
                        document.getElementById("modale").src=this.result;
                        document.getElementById("skille").src=this.result;
                  //  }
                  //  else{
                  //      alert("Skill icons must be 64x64 in dimension");
                  //  }
 
            }
        }
    });
});
</script>
    
     <script type="text/javascript">
$(function() {
    $("#uploadR").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            var image = new Image();
            
            reader.onloadend = function(){ // set image data as background of div

                    image.src=this.result;
                  //  if (image.width==64 && image.height==64) {
                        document.getElementById("modalr").src=this.result;
                        document.getElementById("skillr").src=this.result;
                  //  }
                  //  else{
                   //     alert("Skill icons must be 64x64 in dimension");
                   // }
 
            }
        }
    });
});
</script>
 
      <script type="text/javascript">
$(function() {
    $("#uploadSplash").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            var image = new Image();
            
            reader.onloadend = function(){ // set image data as background of div

                  //  image.src=this.result;
                 //   if (image.width==1215 && image.height==717) {
                        //document.getElementById("modalr").src=this.result;
                        document.getElementById("splash").src=this.result;
                //    }
                //    else{
                //        alert("Skill icons must be 1215x717 in dimension");
                 //   }
 
            }
        }
    });
});
</script>
 
<script type="text/javascript">
$(function() {
    $("#uploadIcon").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            var image = new Image();
            
            reader.onloadend = function(){ // set image data as background of div

                    image.src=this.result;
                   // if (image.width==120 && image.height==120) {
                        //document.getElementById("modalr").src=this.result;
                        document.getElementById("icon").src=this.result;
                    //}
                    //else{
                    //    alert("Skill icons must be 120x120 in dimension");
                    //}
 
            }
        }
    });
});
</script>

<script type="text/javascript">
    function removeProp(i, letter) {
        
        var row=document.getElementById(letter+i)
        alert(row.rowIndex);
        document.getElementById("myTable"+letter).deleteRow(row.rowIndex)
    }
</script>
       
       
 <script type="text/javascript">
function confirmDelete() {
     if (confirm("Are  you sure you want to delete this champion?")){
        location.href='delete.php';
     }
}
</script>
    <script src="js/bootstrap.min.js"></script> 
</body>

