(function (tinymce) {

	if (!tinymce) { return; }

	tinymce.init({
		selector: 'textarea',
		height: 500,
		plugins: 'codesample code',
		codesample_dialog_width: '400',
		codesample_dialog_height: '400',
		codesample_languages: [
			{ text: 'HTML/XML', value: 'markup' },
			{ text: 'JavaScript', value: 'javascript' },
			{ text: 'CSS', value: 'css' },
			{ text: 'PHP', value: 'php' },
			{ text: 'Ruby', value: 'ruby' },
			{ text: 'Python', value: 'python' },
			{ text: 'Java', value: 'java' },
			{ text: 'C', value: 'c' },
			{ text: 'C#', value: 'csharp' },
			{ text: 'C++', value: 'cpp' }
		],
		toolbar: 'codesample code',
		content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css']
	});

}(window.tinymce));