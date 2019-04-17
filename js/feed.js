$(".text").click(function(){
    $(".text").hide();
}); 

$(".cancel-btn").click(function(){
    $(".text").show();
});

$('.text').click(function(){
    $(".add-comment").slideToggle();
});

$('.post-comment-btn').click(function(){ 
	var data = $('.example-textarea').val();
	if(!data){
		alert("Plese Enter value after click button post comment..");
	}else{
		$('.example-textarea').val('');
		$(".sub-comment").append('<div class="example"><div class="comment-img"><img src="http://nicesnippets.com/demo/man03.png" class="example"></div><div class="comment"><p>'+ data +'</p></div><div style="clear:both;"></div></div>');
	}
});

$(".cancel-btn").click(function(){
    $(".add-comment").hide();
});