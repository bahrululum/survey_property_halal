/**

 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.

 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license

 */



CKEDITOR.editorConfig = function( config ) {

	// Define changes to default configuration here. For example:

	/**
* Sets the behavior for the ENTER key. It also dictates other behaviour
* rules in the editor, like whether the &lt;br&gt; element is to be used
* as a paragraph separator when indenting text.
* The allowed values are the following constants, and their relative
* behavior:
* <ul>
* <li>{@link CKEDITOR.ENTER_P} (1): new &lt;p&gt; paragraphs are created;</li>
* <li>{@link CKEDITOR.ENTER_BR} (2): lines are broken with &lt;br&gt; elements;</li>
* <li>{@link CKEDITOR.ENTER_DIV} (3): new &lt;div&gt; blocks are created.</li>
* </ul>
* <strong>Note</strong>: It's recommended to use the
* {@link CKEDITOR.ENTER_P} value because of its semantic value and
* correctness. The editor is optimized for this value.
* @type Number
* @default {@link CKEDITOR.ENTER_P}
* @example
* // Not recommended.
* config.enterMode = CKEDITOR.ENTER_BR;
*/
 enterMode : CKEDITOR.ENTER_P,

	// config.language = 'fr';

	// config.uiColor = '#AADC6E';

	config.skin="bootstrapck";

	config.extraPlugins = 'eqneditor,widget,html5audio,youtube,html5video,widget,widgetselection,clipboard,lineutils';

	config.pasteFromWordCleanupFile

	config.pasteFromWordPromptCleanup



	config.youtube_width = '640';

	config.youtube_height = '480';

	config.youtube_responsive = true;

	config.youtube_related = true;

	config.youtube_older = false;

	config.youtube_privacy = false;

	config.youtube_autoplay = false;

	config.youtube_controls = true;

	// config.youtube_disabled_fields = ['txtEmbed', 'chkAutoplay'];

	// config.enterMode                 = CKEDITOR.ENTER_DIV; 

	// config.shiftEnterMode             = CKEDITOR.ENTER_BR;

	config.toolbarGroups = [

{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },

{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },

{ name: 'links' },

{ name: 'insert' },

{ name: 'forms' },

{ name: 'tools' },

{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },

{ name: 'others' },

'/',

{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },

{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },

{ name: 'styles' },

{ name: 'colors' },

{ name: 'about' }

];

};

