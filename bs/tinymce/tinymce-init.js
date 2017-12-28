tinymce.init({
	selector: "textarea.tinymce",

	theme: "modern",
	skin: "lightgray",

	width: "100%",
	height: 300,

	statubar: true,

	toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
	image_advtab: true,
    templates: [
    	{ title: 'Test template 1', content: 'Test 1' },
    	{ title: 'Test template 2', content: 'Test 2' }
  	],
  	content_css: [
    	'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    	'//www.tinymce.com/css/codepen.min.css'
  	]
});