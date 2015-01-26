/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	//follows:config.filebrowserUploadUrl='../ckupload.php';-easy.
	config.uiColor = '#AADC6E';
	//config.uiColor = '#FF0000';
    config.resize_enabled = false;
    config.toolbar = 'MyToolbar';

    config.toolbar_MyToolbar = [
        ['NewPage','Preview','Ajaxsave'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Scayt'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Table','HorizontalRule','Smiley','SpecialChar','Image'],
        '/',
        ['Styles','Format','Font', 'FontSize'],
        ['Bold','Italic','Strike'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
        ['Link','Unlink','Anchor'],
        ['Maximize','-'],
	['TextColor', 'BGColor']
	
	
    ];

    config.extraPlugins = 'ajaxsave';
};
