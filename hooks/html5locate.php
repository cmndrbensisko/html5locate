<?php defined('SYSPATH') or die('No direct script access.');
/**
* HTML5 Geolocation Hook - Load All Events
*
* PHP version 5
* LICENSE: This source file is subject to LGPL license
* that is available through the world-wide-web at the following URI:
* http://www.gnu.org/copyleft/lesser.html
* @author         Ushahidi Team <team@ushahidi.com>
* @package         Ushahidi - http://source.ushahididev.com
* @copyright Ushahidi - http://www.ushahidi.com
* @license         http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
*/

class html5locate {
        /**
         * Registers the main event add method
         */
        public function __construct()
        {        
                // Hook into routing
                Event::add('system.pre_controller', array($this, 'add'));
        }
		
		/**
         * Adds all the events to the main Ushahidi application
         */
        public function add()
        {
                // Only add the events if we are on that controller
				Event::add('ushahidi_action.report_form_location', array($this, '_button'));
                Event::add('ushahidi_action.header_scripts', array($this, '_submit_edit_js'));
        }

		public function _submit_edit_js()
        {
                $js = View::factory('html5locate/submit_edit_js');

                // ** Next Version Will Have Floating Windows on Map
                //$js->categories_view = View::factory('fullscreenmap/categories');
                //$js->categories_view->categories = $parent_categories;
                //$js->categories_view->default_map_all = Kohana::config('settings.default_map_all');
                //$js->categories_view = "";
                $js->render(TRUE);
        }
        
        public function _button()
        {
                $button = View::factory('html5locate/button');
                $button->render(TRUE);
        }
		
}
new html5locate;