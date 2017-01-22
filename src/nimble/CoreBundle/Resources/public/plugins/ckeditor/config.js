/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.stylesSet.add( 'my_styles', [
	// Block-level styles.
	{ name: 'Šedé pozadí', element: 'p', attributes: { 'class' :  'gray_bg' } }

	// Inline styles.
/*	{ name: 'CSS Style', element: 'span', attributes: { 'class': 'my_style' } },
	{ name: 'Marker: Yellow', element: 'span', styles: { 'background-color': 'Yellow' } }*/
]);

var roxyFileman = '/bundles/adminlte/plugins/fileman/index.html';

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'cs';

	config.extraPlugins = 'lineutils';
	config.extraPlugins = 'widget';
	//config.extraPlugins = 'placeholder';
	config.extraPlugins = 'token';

	// Configure token string
	config.tokenStart = '[[';
	config.tokenEnd = ']]';
	/*
	 config.availableTokens = [
	 ["", ""],
	 ["token1", "token1"],
	 ["token2", "token2"],
	 ["token3", "token3"],
	 ];
	 */

	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		'/',
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Save,NewPage,Print,Preview,Templates,Cut,Copy,Paste,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Blockquote,BidiLtr,BidiRtl,Language,Anchor,Smiley,SpecialChar,PageBreak,Iframe,Font,BGColor,ShowBlocks,Subscript,Superscript';

	// For inline style definition.
	config.stylesSet = 'my_styles';

	config.entities_latin = false;

	// FileBrowser

	config.filebrowserBrowseUrl = roxyFileman;
	config.filebrowserImageBrowseUrl = roxyFileman+'?type=image';
	config.removeDialogTabs = 'link:upload;image:upload';

};
