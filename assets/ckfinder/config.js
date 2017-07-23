/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://cksource.com/ckfinder/license
*/

CKFinder.customConfig = function( config )
{
	// Define changes to default configuration here.
	// For the list of available options, check:
	// http://docs.cksource.com/ckfinder_2.x_api/symbols/CKFinder.config.html

	// Sample configuration options:
	// config.uiColor = '#BDE31E';
	// config.language = 'fr';
	// config.removePlugins = 'basket';
	config.filebrowserBrowseUrl = 'http://poshlondon.vn/assets/ckfinder/ckfinder.html';

config.filebrowserImageBrowseUrl = 'http://poshlondon.vn/assets/ckfinder/ckfinder.html?type=Images';

config.filebrowserFlashBrowseUrl = 'http://http://poshlondon.vn/assets/ckfinder/ckfinder.html?type=Flash';

config.filebrowserUploadUrl = 'http://http://poshlondon.vn/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

config.filebrowserImageUploadUrl = 'http://poshlondon.vn/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

config.filebrowserFlashUploadUrl = 'http://poshlondon.vn/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
