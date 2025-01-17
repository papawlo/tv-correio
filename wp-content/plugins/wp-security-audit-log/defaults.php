<?php

// if not included correctly...
if ( !class_exists( 'WpSecurityAuditLog' ) ) exit();

// define custom / new PHP constants
defined('E_CRITICAL') || define('E_CRITICAL', 'E_CRITICAL');
defined('E_DEBUG') || define('E_DEBUG', 'E_DEBUG');
defined('E_RECOVERABLE_ERROR') || define('E_RECOVERABLE_ERROR', 'E_RECOVERABLE_ERROR');
defined('E_DEPRECATED') || define('E_DEPRECATED', 'E_DEPRECATED');
defined('E_USER_DEPRECATED') || define('E_USER_DEPRECATED', 'E_USER_DEPRECATED');

function wsaldefaults_wsal_init(WpSecurityAuditLog $wsal){
    $wsal->constants->UseConstants(array(
            // default PHP constants
            array('name' => 'E_ERROR', 'description' => __('Fatal run-time error.', 'wp-security-audit-log')),
            array('name' => 'E_WARNING', 'description' => __('Run-time warning (non-fatal error).', 'wp-security-audit-log')),
            array('name' => 'E_PARSE', 'description' => __('Compile-time parse error.', 'wp-security-audit-log')),
            array('name' => 'E_NOTICE', 'description' => __('Run-time notice.', 'wp-security-audit-log')),
            array('name' => 'E_CORE_ERROR', 'description' => __('Fatal error that occurred during startup.', 'wp-security-audit-log')),
            array('name' => 'E_CORE_WARNING', 'description' => __('Warnings that occurred during startup.', 'wp-security-audit-log')),
            array('name' => 'E_COMPILE_ERROR', 'description' => __('Fatal compile-time error.', 'wp-security-audit-log')),
            array('name' => 'E_COMPILE_WARNING', 'description' => __('Compile-time warning.', 'wp-security-audit-log')),
            array('name' => 'E_USER_ERROR', 'description' => __('User-generated error message.', 'wp-security-audit-log')),
            array('name' => 'E_USER_WARNING', 'description' => __('User-generated warning message.', 'wp-security-audit-log')),
            array('name' => 'E_USER_NOTICE', 'description' => __('User-generated notice message.', 'wp-security-audit-log')),
            array('name' => 'E_STRICT', 'description' => __('Non-standard/optimal code warning.', 'wp-security-audit-log')),
            array('name' => 'E_RECOVERABLE_ERROR', 'description' => __('Catchable fatal error.', 'wp-security-audit-log')),
            array('name' => 'E_DEPRECATED', 'description' => __('Run-time deprecation notices.', 'wp-security-audit-log')),
            array('name' => 'E_USER_DEPRECATED', 'description' => __('Run-time user deprecation notices.', 'wp-security-audit-log')),
            // custom constants
            array('name' => 'E_CRITICAL', 'description' => __('Critical, high-impact messages.', 'wp-security-audit-log')),
            array('name' => 'E_DEBUG', 'description' => __('Debug informational messages.', 'wp-security-audit-log')),
        ));
    // create list of default alerts 
    $wsal->alerts->RegisterGroup(array(
            __('Other User Activity', 'wp-security-audit-log') => array(
                array(1000, E_NOTICE, __('User logs in', 'wp-security-audit-log'), __('Successfully logged in', 'wp-security-audit-log')),
                array(1001, E_NOTICE, __('User logs out', 'wp-security-audit-log'), __('Successfully logged out', 'wp-security-audit-log')),
                array(1002, E_WARNING, __('Login failed', 'wp-security-audit-log'), __('%Attempts% failed login(s) detected', 'wp-security-audit-log')),
                array(1003, E_WARNING, __('Login failed  / non existing user', 'wp-security-audit-log'), __('%Attempts% failed login(s) detected using non existing user.', 'wp-security-audit-log')),
                array(2010, E_NOTICE, __('User uploaded file from Uploads directory', 'wp-security-audit-log'), __('Uploaded the file %FileName% in %FilePath%', 'wp-security-audit-log')),
                array(2011, E_WARNING, __('User deleted file from Uploads directory', 'wp-security-audit-log'), __('Deleted the file %FileName% from %FilePath%', 'wp-security-audit-log')),
                array(2046, E_CRITICAL, __('User changed a file using the theme editor', 'wp-security-audit-log'), __('Modified %File% with the Theme Editor', 'wp-security-audit-log')),
                array(2051, E_CRITICAL, __('User changed a file using the plugin editor', 'wp-security-audit-log'), __('Modified %File% with the Plugin Editor', 'wp-security-audit-log')),
                array(2052, E_CRITICAL, __('User changed generic tables', 'wp-security-audit-log'), __('Changed the parent of %CategoryName% category from %OldParent% to %NewParent%', 'wp-security-audit-log')),
            ),
            __('Blog Posts', 'wp-security-audit-log') => array(
                array(2000, E_NOTICE, __('User created a new blog post and saved it as draft', 'wp-security-audit-log'), __('Created a new blog post called %PostTitle%. Blog post ID is %PostID%', 'wp-security-audit-log')),
                array(2001, E_NOTICE, __('User published a blog post', 'wp-security-audit-log'), __('Published a blog post called %PostTitle%. Blog post URL is %PostUrl%', 'wp-security-audit-log')),
                array(2002, E_NOTICE, __('User modified a published blog post', 'wp-security-audit-log'), __('Modified the published blog post %PostTitle%. Blog post URL is %PostUrl%', 'wp-security-audit-log')),
                array(2003, E_NOTICE, __('User modified a draft blog post', 'wp-security-audit-log'), __('Modified the draft blog post %PostTitle%. Blog post ID is %PostID%', 'wp-security-audit-log')),
                array(2008, E_NOTICE, __('User permanently deleted a blog post from the trash', 'wp-security-audit-log'), __('Permanently deleted the post %PostTitle%. Blog post ID is %PostID%', 'wp-security-audit-log')),
                array(2012, E_WARNING, __('User moved a blog post to the trash', 'wp-security-audit-log'), __('Moved the blog post %PostTitle% to trash', 'wp-security-audit-log')),
                array(2014, E_CRITICAL, __('User restored a blog post from trash', 'wp-security-audit-log'), __('Restored post %PostTitle% from trash', 'wp-security-audit-log')),
                array(2016, E_NOTICE, __('User changed blog post category', 'wp-security-audit-log'), __('Changed the category of the post %PostTitle% from %OldCategories% to %NewCategories%', 'wp-security-audit-log')),
                array(2017, E_NOTICE, __('User changed blog post URL', 'wp-security-audit-log'), __('Changed the URL of the post %PostTitle% from %OldUrl% to %NewUrl%', 'wp-security-audit-log')),
                array(2019, E_NOTICE, __('User changed blog post author', 'wp-security-audit-log'), __('Changed the author of %PostTitle% post from %OldAuthor% to %NewAuthor%', 'wp-security-audit-log')),
                array(2021, E_NOTICE, __('User changed blog post status', 'wp-security-audit-log'), __('Changed the status of %PostTitle% post from %OldStatus% to %NewStatus%', 'wp-security-audit-log')),
                array(2023, E_NOTICE, __('User created new category', 'wp-security-audit-log'), __('Created a new category called %CategoryName%', 'wp-security-audit-log')),
                array(2024, E_WARNING, __('User deleted category', 'wp-security-audit-log'), __('Deleted the %CategoryName% category', 'wp-security-audit-log')),
                array(2025, E_WARNING, __('User changed the visibility of a blog post', 'wp-security-audit-log'), __('Changed the visibility of %PostTitle% blog post  from %OldVisibility% to %NewVisibility%', 'wp-security-audit-log')),
                array(2027, E_NOTICE, __('User changed the date of a blog post', 'wp-security-audit-log'), __('Changed the date of %PostTitle% blog post from %OldDate% to %NewDate%', 'wp-security-audit-log')),
                array(2049, E_NOTICE, __('User sets a post as sticky', 'wp-security-audit-log'), __('Set the post %PostTitle% as Sticky', 'wp-security-audit-log')),
                array(2050, E_NOTICE, __('User removes post from sticky', 'wp-security-audit-log'), __('Removed the post %PostTitle% from Sticky', 'wp-security-audit-log')),
                array(2053, E_NOTICE, __('User creates a custom field for a post', 'wp-security-audit-log'), __('Created custom field %MetaKey% with value %MetaValue% in post %PostTitle%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2054, E_NOTICE, __('User updates a custom field value for a post', 'wp-security-audit-log'), __('Modified the value of custom field %MetaKey% from %MetaValueOld% to %MetaValueNew% in post %PostTitle%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2055, E_NOTICE, __('User deletes a custom field from a post', 'wp-security-audit-log'), __('Deleted custom field %MetaKey% with id %MetaID% from post %PostTitle%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2062, E_NOTICE, __('User updates a custom field name for a post', 'wp-security-audit-log'), __('Changed the custom field name from %MetaKeyOld% to %MetaKeyNew% in post %PostTitle%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2065, E_WARNING, __('User modifies content for a published post', 'wp-security-audit-log'), __('Modified the content of published post %PostTitle%.'.'%RevisionLink%', 'wp-security-audit-log')),
                array(2068, E_NOTICE, __('User modifies content for a draft post', 'wp-security-audit-log'), __('Modified the content of draft post %PostTitle%.'.'%RevisionLink%', 'wp-security-audit-log')),
                array(2072, E_NOTICE, __('User modifies content of a post', 'wp-security-audit-log'), __('Modified the content of post %PostTitle% which is submitted for review.'.'%RevisionLink%', 'wp-security-audit-log')),
                array(2073, E_NOTICE, __('User submitted a post for review', 'wp-security-audit-log'), __('Submitted blog post %PostTitle% for review. Blog post ID is %PostID%', 'wp-security-audit-log')),
            ),
            __('Pages', 'wp-security-audit-log') => array(
                array(2004, E_NOTICE, __('User created a new WordPress page and saved it as draft', 'wp-security-audit-log'), __('Created a new page called %PostTitle%. Page ID is %PostID%', 'wp-security-audit-log')),
                array(2005, E_NOTICE, __('User published a WorPress page', 'wp-security-audit-log'), __('Published a page called %PostTitle%. Page URL is %PostUrl%', 'wp-security-audit-log')),
                array(2006, E_NOTICE, __('User modified a published WordPress page', 'wp-security-audit-log'), __('Modified the published page %PostTitle%. Page URL is %PostUrl%', 'wp-security-audit-log')),
                array(2007, E_NOTICE, __('User modified a draft WordPress page', 'wp-security-audit-log'), __('Modified the draft page %PostTitle%. Page ID is %PostID%', 'wp-security-audit-log')),
                array(2009, E_NOTICE, __('User permanently deleted a page from the trash', 'wp-security-audit-log'), __('Permanently deleted the page %PostTitle%. Page ID is %PostID%', 'wp-security-audit-log')),
                array(2013, E_WARNING, __('User moved WordPress page to the trash', 'wp-security-audit-log'), __('Moved the page %PostTitle% to trash', 'wp-security-audit-log')),
                array(2015, E_CRITICAL, __('User restored a WordPress page from trash', 'wp-security-audit-log'), __('Restored page %PostTitle% from trash', 'wp-security-audit-log')),
                array(2018, E_NOTICE, __('User changed page URL', 'wp-security-audit-log'), __('Changed the URL of the page %PostTitle% from %OldUrl% to %NewUrl%', 'wp-security-audit-log')),
                array(2020, E_NOTICE, __('User changed page author', 'wp-security-audit-log'), __('Changed the author of %PostTitle% page from %OldAuthor% to %NewAuthor%', 'wp-security-audit-log')),
                array(2022, E_NOTICE, __('User changed page status', 'wp-security-audit-log'), __('Changed the status of %PostTitle% page from %OldStatus% to %NewStatus%', 'wp-security-audit-log')),
                array(2026, E_WARNING, __('User changed the visibility of a page post', 'wp-security-audit-log'), __('Changed the visibility of %PostTitle% page  from %OldVisibility% to %NewVisibility%', 'wp-security-audit-log')),
                array(2028, E_NOTICE, __('User changed the date of a page post', 'wp-security-audit-log'), __('Changed the date of %PostTitle% page from %OldDate% to %NewDate%', 'wp-security-audit-log')),
                array(2047, E_NOTICE, __('User changed the parent of a page', 'wp-security-audit-log'), __('Changed the parent of %PostTitle% page from %OldParentName% to %NewParentName%', 'wp-security-audit-log')),
                array(2048, E_CRITICAL, __('User changes the template of a page', 'wp-security-audit-log'), __('Changed the template of %PostTitle% page from %OldTemplate% to %NewTemplate%', 'wp-security-audit-log')),
                array(2059, E_NOTICE, __('User creates a custom field for a page', 'wp-security-audit-log'), __('Created custom field %MetaKey% with value %MetaValue% in page %PostTitle%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2060, E_NOTICE, __('User updates a custom field value for a page', 'wp-security-audit-log'), __('Modified the value of custom field %MetaKey% from %MetaValueOld% to %MetaValueNew% in page %PostTitle%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2061, E_NOTICE, __('User deletes a custom field from a page', 'wp-security-audit-log'), __('Deleted custom field %MetaKey% with id %MetaID% from page %PostTitle%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2064, E_NOTICE, __('User updates a custom field name for a page', 'wp-security-audit-log'), __('Changed the custom field name from %MetaKeyOld% to %MetaKeyNew% in page %PostTitle%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2066, E_WARNING, __('User modifies content for a published page', 'wp-security-audit-log'), __('Modified the content of published page %PostTitle%.'.'%RevisionLink%', 'wp-security-audit-log')),
                array(2069, E_NOTICE, __('User modifies content for a draft page', 'wp-security-audit-log'), __('Modified the content of draft page %PostTitle%.'.'%RevisionLink%', 'wp-security-audit-log')),
            ),
            __('Custom Posts', 'wp-security-audit-log') => array(
                array(2029, E_NOTICE, __('User created a new post with custom post type and saved it as draft', 'wp-security-audit-log'), __('Created a new custom post called %PostTitle% of type %PostType%. Post ID is %PostID%', 'wp-security-audit-log')),
                array(2030, E_NOTICE, __('User published a post with custom post type', 'wp-security-audit-log'), __('Published a custom post %PostTitle% of type %PostType%. Post URL is %PostUrl%', 'wp-security-audit-log')),
                array(2031, E_NOTICE, __('User modified a post with custom post type', 'wp-security-audit-log'), __('Modified custom post %PostTitle% of type %PostType%. Post URL is %PostUrl%', 'wp-security-audit-log')),
                array(2032, E_NOTICE, __('User modified a draft post with custom post type', 'wp-security-audit-log'), __('Modified draft custom post %PostTitle% of type is %PostType%. Post URL is %PostUrl%', 'wp-security-audit-log')),
                array(2033, E_WARNING, __('User permanently deleted post with custom post type', 'wp-security-audit-log'), __('Permanently Deleted custom post %PostTitle% of type %PostType%', 'wp-security-audit-log')),
                array(2034, E_WARNING, __('User moved post with custom post type to trash', 'wp-security-audit-log'), __('Moved custom post %PostTitle% to trash. Post type is %PostType%', 'wp-security-audit-log')),
                array(2035, E_CRITICAL, __('User restored post with custom post type from trash', 'wp-security-audit-log'), __('Restored custom post %PostTitle% of type %PostType% from trash', 'wp-security-audit-log')),
                array(2036, E_NOTICE, __('User changed the category of a post with custom post type', 'wp-security-audit-log'), __('Changed the category(ies) of custom post %PostTitle% of type %PostType% from %OldCategories% to %NewCategories%', 'wp-security-audit-log')),
                array(2037, E_NOTICE, __('User changed the URL of a post with custom post type', 'wp-security-audit-log'), __('Changed the URL of custom post %PostTitle% of type %PostType% from %OldUrl% to %NewUrl%', 'wp-security-audit-log')),
                array(2038, E_NOTICE, __('User changed the author or post with custom post type', 'wp-security-audit-log'), __('Changed the author of custom post %PostTitle% of type %PostType% from %OldAuthor% to %NewAuthor%', 'wp-security-audit-log')),
                array(2039, E_NOTICE, __('User changed the status of post with custom post type', 'wp-security-audit-log'), __('Changed the status of custom post %PostTitle% of type %PostType% from %OldStatus% to %NewStatus%', 'wp-security-audit-log')),
                array(2040, E_WARNING, __('User changed the visibility of a post with custom post type', 'wp-security-audit-log'), __('Changed the visibility of custom post %PostTitle% of type %PostType% from %OldVisibility% to %NewVisibility%', 'wp-security-audit-log')),
                array(2041, E_NOTICE, __('User changed the date of post with custom post type', 'wp-security-audit-log'), __('Changed the date of custom post %PostTitle% of type %PostType% from %OldDate% to %NewDate%', 'wp-security-audit-log')),
                array(2056, E_NOTICE, __('User creates a custom field for a custom post', 'wp-security-audit-log'), __('Created custom field %MetaKey% with value %MetaValue% in custom post %PostTitle% of type %PostType%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2057, E_NOTICE, __('User updates a custom field for a custom post', 'wp-security-audit-log'), __('Modified the value of custom field %MetaKey% from %MetaValueOld% to %MetaValueNew% in custom post %PostTitle% of type %PostType%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2058, E_NOTICE, __('User deletes a custom field from a custom post', 'wp-security-audit-log'), __('Deleted custom field %MetaKey% with id %MetaID% from custom post %PostTitle% of type %PostType%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2063, E_NOTICE, __('User updates a custom field name for a custom post', 'wp-security-audit-log'), __('Changed the custom field name from %MetaKeyOld% to %MetaKeyNew% in custom post %PostTitle% of type %PostType%'.'%MetaLink%', 'wp-security-audit-log')),
                array(2067, E_WARNING, __('User modifies content for a published custom post', 'wp-security-audit-log'), __('Modified the content of published custom post type %PostTitle%.'.'%RevisionLink%', 'wp-security-audit-log')),
                array(2070, E_NOTICE, __('User modifies content for a draft custom post', 'wp-security-audit-log'), __('Modified the content of draft custom post type %PostTitle%.'.'%RevisionLink%', 'wp-security-audit-log')),
            ),
            __('Widgets', 'wp-security-audit-log') => array(
                array(2042, E_CRITICAL, __('User added a new widget', 'wp-security-audit-log'), __('Added a new %WidgetName% widget in  %Sidebar%', 'wp-security-audit-log')),
                array(2043, E_WARNING, __('User modified a widget', 'wp-security-audit-log'), __('Modified the %WidgetName% widget in %Sidebar%', 'wp-security-audit-log')),
                array(2044, E_CRITICAL, __('User deleted widget', 'wp-security-audit-log'), __('Deleted the %WidgetName% widget from %Sidebar%', 'wp-security-audit-log')),
                array(2045, E_NOTICE, __('User moved widget', 'wp-security-audit-log'), __('Moved the %WidgetName% widget from %OldSidebar% to %NewSidebar%', 'wp-security-audit-log')),
                array(2071, E_NOTICE, __('User changed widget position', 'wp-security-audit-log'), __('Moved the %WidgetName% widget from position %OldPosition% to position %NewPosition% in sidebar %Sidebar%', 'wp-security-audit-log')),
            ),
            __('User Profiles', 'wp-security-audit-log') => array(
                array(4000, E_CRITICAL, __('A new user was created on WordPress', 'wp-security-audit-log'), __('User %NewUserData->Username% subscribed with a role of %NewUserData->Roles%', 'wp-security-audit-log')),
                array(4001, E_CRITICAL, __('A user created another WordPress user', 'wp-security-audit-log'), __('Created a new user %NewUserData->Username% with the role of %NewUserData->Roles%', 'wp-security-audit-log')),
                array(4002, E_CRITICAL, __('The role of a user was changed by another WordPress user', 'wp-security-audit-log'), __('Changed the role of user %TargetUsername% from %OldRole% to %NewRole%', 'wp-security-audit-log')),
                array(4003, E_CRITICAL, __('User has changed his or her password', 'wp-security-audit-log'), __('Changed the password', 'wp-security-audit-log')),
                array(4004, E_CRITICAL, __('A user changed another user\'s password', 'wp-security-audit-log'), __('Changed the password for user %TargetUserData->Username% with the role of %TargetUserData->Roles%', 'wp-security-audit-log')),
                array(4005, E_NOTICE, __('User changed his or her email address', 'wp-security-audit-log'), __('Changed the email address from %OldEmail% to %NewEmail%', 'wp-security-audit-log')),
                array(4006, E_NOTICE, __('A user changed another user\'s email address', 'wp-security-audit-log'), __('Changed the email address of user account %TargetUsername% from %OldEmail% to %NewEmail%', 'wp-security-audit-log')),
                array(4007, E_CRITICAL, __('A user was deleted by another user', 'wp-security-audit-log'), __('Deleted User %TargetUserData->Username% with the role of %TargetUserData->Roles%', 'wp-security-audit-log')),
            ),
            __('Plugins & Themes', 'wp-security-audit-log') => array(
                array(5000, E_CRITICAL, __('User installed a plugin', 'wp-security-audit-log'), __('Installed the plugin %Plugin->Name% in %Plugin->plugin_dir_path%', 'wp-security-audit-log')),
                array(5001, E_CRITICAL, __('User activated a WordPress plugin', 'wp-security-audit-log'), __('Activated the plugin %PluginData->Name% installed in %PluginFile%', 'wp-security-audit-log')),
                array(5002, E_CRITICAL, __('User deactivated a WordPress plugin', 'wp-security-audit-log'), __('Deactivated the plugin %PluginData->Name% installed in %PluginFile%', 'wp-security-audit-log')),
                array(5003, E_CRITICAL, __('User uninstalled a plugin', 'wp-security-audit-log'), __('Uninstalled the plugin %PluginData->Name% which was installed in %PluginFile%', 'wp-security-audit-log')),
                array(5004, E_WARNING, __('User upgraded a plugin', 'wp-security-audit-log'), __('Upgraded the plugin %PluginData->Name% installed in %PluginFile%', 'wp-security-audit-log')),
                array(5005, E_CRITICAL, __('User installed a theme', 'wp-security-audit-log'), __('Installed theme "%Theme->Name%" in %Theme->get_template_directory%', 'wp-security-audit-log')),
                array(5006, E_CRITICAL, __('User activated a theme', 'wp-security-audit-log'), __('Activated theme "%Theme->Name%", installed in %Theme->get_template_directory%', 'wp-security-audit-log')),
                array(5007, E_CRITICAL, __('User uninstalled a theme', 'wp-security-audit-log'), __('Deleted theme "%Theme->Name%" installed in %Theme->get_template_directory%', 'wp-security-audit-log')),
            ),
            __('System Activity', 'wp-security-audit-log') => array(
                array(0000, E_CRITICAL, __('Unknown Error', 'wp-security-audit-log'), __('An unexpected error has occurred', 'wp-security-audit-log')),
                array(0001, E_CRITICAL, __('PHP error', 'wp-security-audit-log'), __('%Message%', 'wp-security-audit-log')),
                array(0002, E_WARNING, __('PHP warning', 'wp-security-audit-log'), __('%Message%', 'wp-security-audit-log')),
                array(0003, E_NOTICE, __('PHP notice', 'wp-security-audit-log'), __('%Message%', 'wp-security-audit-log')),
                array(0004, E_CRITICAL, __('PHP exception', 'wp-security-audit-log'), __('%Message%', 'wp-security-audit-log')),
                array(0005, E_CRITICAL, __('PHP shutdown error', 'wp-security-audit-log'), __('%Message%', 'wp-security-audit-log')),
                array(6000, E_NOTICE, __('Events automatically pruned by system', 'wp-security-audit-log'), __('%EventCount% event(s) automatically deleted by system', 'wp-security-audit-log')),
                array(6001, E_CRITICAL, __('Option Anyone Can Register in WordPress settings changed', 'wp-security-audit-log'), __('%NewValue% the option "Anyone can register"', 'wp-security-audit-log')),
                array(6002, E_CRITICAL, __('New User Default Role changed', 'wp-security-audit-log'), __('Changed the New User Default Role from %OldRole% to %NewRole%', 'wp-security-audit-log')),
                array(6003, E_CRITICAL, __('WordPress Administrator Notification email changed', 'wp-security-audit-log'), __('Changed the WordPress administrator notifications email address from %OldEmail% to %NewEmail%', 'wp-security-audit-log')),
                array(6004, E_CRITICAL, __('WordPress was updated', 'wp-security-audit-log'), __('Updated WordPress from version %OldVersion% to %NewVersion%', 'wp-security-audit-log')),
                array(6005, E_CRITICAL, __('User changes the WordPress Permalinks', 'wp-security-audit-log'), __('Changed the WordPress permalinks from %OldPattern% to %NewPattern%', 'wp-security-audit-log')),
            ),
            __('MultiSite', 'wp-security-audit-log') => array(
                array(4008, E_CRITICAL, __('User granted Super Admin privileges', 'wp-security-audit-log'), __('Granted Super Admin privileges to %TargetUsername%', 'wp-security-audit-log')),
                array(4009, E_CRITICAL, __('User revoked from Super Admin privileges', 'wp-security-audit-log'), __('Revoked Super Admin privileges from %TargetUsername%', 'wp-security-audit-log')),
                array(4010, E_CRITICAL, __('Existing user added to a site', 'wp-security-audit-log'), __('Added existing user %TargetUsername% with %TargetUserRole% role to site %SiteName%', 'wp-security-audit-log')),
                array(4011, E_CRITICAL, __('User removed from site', 'wp-security-audit-log'), __('Removed user %TargetUsername% with role %TargetUserRole% from %SiteName% site', 'wp-security-audit-log')),
                array(4012, E_CRITICAL, __('New network user created', 'wp-security-audit-log'), __('Created a new network user %NewUserData->Username%', 'wp-security-audit-log')),
                array(7000, E_CRITICAL, __('New site added on network', 'wp-security-audit-log'), __('Added site %SiteName% to the network', 'wp-security-audit-log')),
                array(7001, E_CRITICAL, __('Existing site archived', 'wp-security-audit-log'), __('Archived site %SiteName%', 'wp-security-audit-log')),
                array(7002, E_CRITICAL, __('Archived site has been unarchived', 'wp-security-audit-log'), __('Unarchived site %SiteName%', 'wp-security-audit-log')),
                array(7003, E_CRITICAL, __('Deactivated site has been activated', 'wp-security-audit-log'), __('Activated site %SiteName%', 'wp-security-audit-log')),
                array(7004, E_CRITICAL, __('Site has been deactivated', 'wp-security-audit-log'), __('Deactivated site %SiteName%', 'wp-security-audit-log')),
                array(7005, E_CRITICAL, __('Existing site deleted from network', 'wp-security-audit-log'), __('Deleted site %SiteName%', 'wp-security-audit-log')),
                array(5008, E_CRITICAL, __('Activated theme on network', 'wp-security-audit-log'), __('Network activated %Theme->Name% theme installed in %Theme->get_template_directory%', 'wp-security-audit-log')),
                array(5009, E_CRITICAL, __('Deactivated theme from network', 'wp-security-audit-log'), __('Network deactivated %Theme->Name% theme installed in %Theme->get_template_directory%', 'wp-security-audit-log')),
            ),
            __('Database', 'wp-security-audit-log') => array(
                array(5010, E_CRITICAL, __('Plugin created tables', 'wp-security-audit-log'), __('Plugin %Plugin->Name% created these tables in the database: %TableNames%', 'wp-security-audit-log')),
                array(5011, E_CRITICAL, __('Plugin modified tables structure', 'wp-security-audit-log'), __('Plugin %Plugin->Name% modified the structure of these database tables: %TableNames%', 'wp-security-audit-log')),
                array(5012, E_CRITICAL, __('Plugin deleted tables', 'wp-security-audit-log'), __('Plugin %Plugin->Name% deleted the following tables from the database: %TableNames%', 'wp-security-audit-log')),
                array(5013, E_CRITICAL, __('Theme created tables', 'wp-security-audit-log'), __('Theme %Theme->Name% created these tables in the database: %TableNames%', 'wp-security-audit-log')),
                array(5014, E_CRITICAL, __('Theme modified tables structure', 'wp-security-audit-log'), __('Theme %Theme->Name% modified the structure of these database tables: %TableNames%', 'wp-security-audit-log')),
                array(5015, E_CRITICAL, __('Theme deleted tables', 'wp-security-audit-log'), __('Theme %Theme->Name% deleted the following tables from the database: %TableNames%', 'wp-security-audit-log')),
                array(5016, E_CRITICAL, __('Unknown component created tables', 'wp-security-audit-log'), __('An unknown component created these tables in the database: %TableNames%', 'wp-security-audit-log')),
                array(5017, E_CRITICAL, __('Unknown component modified tables structure', 'wp-security-audit-log'), __('An unknown component modified the structure of these database tables: %TableNames%', 'wp-security-audit-log')),
                array(5018, E_CRITICAL, __('Unknown component deleted tables', 'wp-security-audit-log'), __('An unknown component deleted the following tables from the database: %TableNames%', 'wp-security-audit-log')),
            ),
        ));
}
add_action('wsal_init', 'wsaldefaults_wsal_init');

