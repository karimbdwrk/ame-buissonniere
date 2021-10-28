// jQuery(document).ready(function(){
//     var $post = jQuery('.posts'),
// 	$postli = $post.children('.post');
    
//     $postli.sort(function(a,b){
//     	var an = a.getAttribute('data-name'),
//     		bn = b.getAttribute('data-name');
    
//     	if(an > bn) {
//     		return 1;
//     	}
//     	if(an < bn) {
//     		return -1;
//     	}
//     	return 0;
//     });
    
//     $postli.detach().appendTo($post);
// });

if (jQuery('.page-id-667').length) {
    console.log('blog page')

    var $post = jQuery('.posts'),
	$postli = $post.children('.post');

    console.log($post)
    
    $postli.sort(function(a,b){
    	var an = a.getAttribute('data-nbr'),
    		bn = b.getAttribute('data-nbr');
    
    	if(an > bn) {
    		return 1;
    	}
    	if(an < bn) {
    		return -1;
    	}
    	return 0;
    });
    
    $postli.detach().appendTo($post);
}