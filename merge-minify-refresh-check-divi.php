<?php
/**
 * Plugin Name: MMR Disable for DIVI
 * Plugin URI: https://wordpress.org/plugins/merge-minify-refresh
 * Description: Disable MMR when DIVI Editor is active
 * Version: 1.1.1
 * Author: Launch Interactive
 * Author URI: http://launchinteractive.com.au
 * License: GPL2

Copyright 2019  Marc Castles  (email : marc@launchinteractive.com.au)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function should_mmr_divi($should_mmr)
{
    if($should_mmr && is_user_logged_in())
    {
	    $themeName = wp_get_theme()->get('Name');
        if(is_child_theme() && wp_get_theme()->parent())
        {
            $themeName = wp_get_theme()->parent()->get('Name');
        }
	    if($themeName == 'Divi' && isset($_GET['et_fb']) && $_GET['et_fb'] == '1')
	    { 
			return false;
	    }
    }
    return $should_mmr;
}
add_filter('should_mmr', 'should_mmr_divi');