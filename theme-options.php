<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function _custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request 
  * if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
   * return false;
    */
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'Option Types', karisma_text_domain ),
          'content'   => __( '<p>Help content goes here!</p>', karisma_text_domain )
          )
        ),
      'sidebar'       => __( '<p>Sidebar content goes here!</p>', karisma_text_domain )
      ),
    'sections'        => array( 
      array(
        'id'          => 'general_tab',
        'title'       => __( 'General', karisma_text_domain )
        ),
      array(
        'id'          => 'custom_tab',
        'title'       => __( 'Custom Web', karisma_text_domain)
        ),
      array(
        'id'          => 'banner_tab',
        'title'       => __( 'Banner Ads', karisma_text_domain )
        ),
      array(
        'id'          => 'social_tab',
        'title'       => __( 'Social Network', karisma_text_domain )
        ),
      array(
        'id'          => 'single_tab',
        'title'       => __( 'Single Page', karisma_text_domain )
        ),
      array(
        'id'          => 'gallery_tab',
        'title'       => __( 'Gallery & Attachments', karisma_text_domain )
        ),
      array(
        'id'          => 'comment_tab',
        'title'       => __( 'Comments', karisma_text_domain )
        ),
      array(
        'id'          => 'bulkpost_tab',
        'title'       => __( 'Bulk Post', karisma_text_domain )
        ),
      array(
        'id'          => 'autocontent_tab',
        'title'       => __( 'Auto description', karisma_text_domain )
        ),
      array(
        'id'          => 'other_tab',
        'title'       => __( 'Other setting', karisma_text_domain )
        ),
      // array(
      //   'id'          => 'seo_tab',
      //   'title'       => __( 'SEO', karisma_text_domain )
      //   ),
      array(
        'id'          => 'license_tab',
        'title'       => __( 'Theme License', karisma_text_domain )
        ),
      array(
        'id'          => 'themeinfo_tab',
        'title'       => __( 'System Information', karisma_text_domain )
        ),
      ),
    'settings'        => array(
      array(
        'id'          => 'krs_logo_actived',
        'label'       => __( 'Enable logo image?', karisma_text_domain ),
        'desc'        => __( 'Please select on for enable logo image and select off for disable logo image.', karisma_text_domain ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => __( 'on', karisma_text_domain ),
            'src'         => ''
            ),
          array(
            'value'       => 'off',
            'label'       => __( 'off', karisma_text_domain ),
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'krs_logo',
        'label'       => __( 'Your logo image', karisma_text_domain ),
        'desc'        => __( 'Upload your logo image and type full path here. Default width:232px and height:90px.', karisma_text_domain ),
        'std'         => krs_url .'img/logo.png',
        'type'        => 'upload',
        'section'     => 'general_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'krs_logo_actived:is(on),krs_logo_actived:off()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_favicon',
        'label'       => __( 'Your Favicon', karisma_text_domain ),
        'desc'        => __( 'Upload your ico image or type full path here.', karisma_text_domain ),
        'std'         => krs_url .'img/icons/favicon.ico',
        'type'        => 'upload',
        'section'     => 'general_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_appleicon',
        'label'       => __( 'Your Apple Touch Icon', karisma_text_domain ),
        'desc'        => __( 'Upload a 16 x 16 px image that will represent your website\'s favicon. You can refer to this link for more information on how to make it: http://www.favicon.cc/', karisma_text_domain ),
        'std'         => krs_url .'img/icons/touch.png',
        'type'        => 'upload',
        'section'     => 'general_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_head',
        'label'       => __( 'Head Code', karisma_text_domain ),
        'desc'        => __( 'Enter the code which you need to place before closing tag. (ex: Google Webmaster Tools verification, Bing Webmaster Center, BuySellAds Script, Alexa verification etc.)', karisma_text_domain ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_tab',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_footer',
        'label'       => __( 'Footer Script', karisma_text_domain ),
        'desc'        => __( 'If you need to add scripts to your footer, do so here. (ex: Google Analytics).', karisma_text_domain ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_tab',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_footcredits',
        'label'       => __( 'Text footer credits', karisma_text_domain ),
        'desc'        => __( 'You can change or remove karisma link from footer and use your own custom text. Tip: You can use our affiliate link and earn 60% commission on every sale.', karisma_text_domain ),
        'std'         => '© 2017 Themes by <a href="http://karismaid.com">Karisma ID</a> and Powered by <a href="http://www.wordpress.org">Wordpress</a>',
        'type'        => 'textarea-simple',
        'section'     => 'general_tab',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      /* Custom Website */
      array(
        'label' => __( 'Color', karisma_text_domain ),
        'id' => 'colorstyle',
        'type' => 'tab',
        'section'     => 'custom_tab'
        ), 
      array(
        'id'          => 'krs_main_colorpicker',
        'label'       => __( 'Change main color', karisma_text_domain ),
        'desc'        => __( 'You can change main color website.', karisma_text_domain ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'custom_tab',
        'rows'        => '2',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_second_colorpicker',
        'label'       => __( 'Change secondary color', karisma_text_domain ),
        'desc'        => __( 'You can change secondary color website.', karisma_text_domain ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'custom_tab',
        'rows'        => '2',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_tertiary_colorpicker',
        'label'       => __( 'Change tertiary color', karisma_text_domain ),
        'desc'        => __( 'You can change tertiary color website.', karisma_text_domain ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'custom_tab',
        'rows'        => '2',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_link_colorpicker',
        'label'       => __( 'Change link color', karisma_text_domain ),
        'desc'        => __( 'You can change link color website.', karisma_text_domain ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'custom_tab',
        'rows'        => '2',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_linkhover_colorpicker',
        'label'       => __( 'Change link hover color', karisma_text_domain ),
        'desc'        => __( 'You can change link hover color website.', karisma_text_domain ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'custom_tab',
        'rows'        => '2',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_bg_colorpicker',
        'label'       => __( 'Change background color', karisma_text_domain ),
        'desc'        => __( 'You can change background color website.', karisma_text_domain ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'custom_tab',
        'rows'        => '2',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_btn_colorpicker',
        'label'       => __( 'Change button color', karisma_text_domain ),
        'desc'        => __( 'This can change clickable element on website like button.', karisma_text_domain ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'custom_tab',
        'rows'        => '2',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_btnhover_colorpicker',
        'label'       => __( 'Change button hover color', karisma_text_domain ),
        'desc'        => __( 'This can change clickable hover element on website like button.', karisma_text_domain ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'custom_tab',
        'rows'        => '2',
        'condition'   => '',
        'operator'    => 'and'
        ),

      array(
       'label' => __( 'Layout', karisma_text_domain ),
       'id' => 'layoutstyle',
       'type' => 'tab',
       'section'     => 'custom_tab'
       ),
      array(
       'label'       => 'Sidebars',
       'id'          => 'krs_sidebars',
       'type'        => 'list-item',
       'desc'        => 'Add Unlimited Sidebars to your website.',
       'settings'    => array(
         array(
           'label'       => 'Slug',
           'id'          => 'slug',
           'type'        => 'text',
           'desc'        => 'Sidebar Slug "All lowercase and must be unique".',
           'std'         => ''
           ),
         array(
           'label'       => 'Description',
           'id'          => 'description',
           'type'        => 'textarea-simple',
           'desc'        => 'Sidebar Description.',
           'std'         => '',
           'rows'        => '5'
           )
         ),
       'std'         => '',
       'section'     => 'custom_tab'
       ),   
      array(
        'label'       => __( 'Sidebar Layout', karisma_text_domain ),
        'id'          => 'krs_sb_layout',
        'type'        => 'radio-image',
        'desc'        => __( 'Select default sidebar for your global website.', karisma_text_domain ),
        'choices'     => sidebar_select(),
        'std'         => 'right',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'custom_tab'
        ), 
/*      array(
        'label'       => __( 'Footer coloum', karisma_text_domain ),
        'id'          => 'krs_footer_columns',
        'type'        => 'radio-image',
        'desc'        => __( 'Select footer coloums layout, you can select footer coloum layout. Example 1/1 (full), 1/2 : 1/2, etc..', karisma_text_domain ),
        'choices'     => coloum_select(),
        'std'         => 'onefourth_onefourth_onefourth_onefourth',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'custom_tab'
        ), */
      array(
       'label' => __( 'Typography / Font', karisma_text_domain ),
       'id' => 'typographystyle',
       'type' => 'tab',
       'section'     => 'custom_tab'
       ), 
      array( // Google Font API
  			'id'          => 'google-font-api',
  			'label'       => __('Google Font API Key', karisma_text_domain),
  			'desc'        => __('Enter your Google Font API Key to ensure updates of the google font library.', karisma_text_domain),
  			'std'         => '',
  			'type'        => 'text',
  			'section'     => 'custom_tab',
  			'class'       => ''
  		),
      array(
        'label'       => 'Body Font',
        'id'          => 'krs_body_font',
        'type'        => 'typography_body',
        'desc'        => 'Select your body "Default" font from the available fonts, Fonts are provided via Google Fonts API.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'custom_tab'
        ),
      array(
        'label'       => 'Heading Fonts',
        'id'          => 'krs_heading_font',
        'type'        => 'typography_heading',
        'desc'        => 'Select your heading "Default" font from the available fonts, Fonts are provided via Google Fonts API.',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'custom_tab'
        ),
      array(
       'label' => __( 'Custom CSS', karisma_text_domain ),
       'id' => 'customstyle',
       'type' => 'tab',
       'section'     => 'custom_tab'
       ), 
      array(
        'label'       => 'Custom CSS',
        'id'          => 'krs_dynamiccss',
        'type'        => 'css',
        'desc'        => 'If you need modification CSS, please fill here...',
  			'std'		  => '/* Font-Styles - DO NOT EDIT OR REMOVE THIS VALUES */
  body { {{font_body}} }',
        'section'     => 'custom_tab'
        ),
      /* Banner */
      array(
        'id'          => 'krs_ban72890_aftermenu_activated',
        'label'       => __( 'Enable archive header banner 728x90?', karisma_text_domain ),
        'desc'        => __( 'Please select on for enable header banner 728x90 and select off for disable header banner 728x90.', karisma_text_domain ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'banner_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => __( 'on', karisma_text_domain ),
            'src'         => ''
            ),
          array(
            'value'       => 'off',
            'label'       => __( 'off', karisma_text_domain ),
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'krs_ban72890_aftermenu',
        'label'       => __( 'Archive Header banner (728x90)', karisma_text_domain ),
        'desc'        => __( 'Fill with banner 728x90 header banner.', karisma_text_domain ),
        'std'         => '<a href="https://karismaid.com" title="banner 728x90"><img src="https://storage.googleapis.com/support-kms-prod/SNP_501E7C3D5CA3CA07C641E6BAFB8A53C794CF_2922339_en_v2" alt="banner 728x90" title="banner 728x90" height="90" width="728" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner_tab',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'krs_ban72890_aftermenu_activated:is(on),krs_ban72890_aftermenu_activated:off()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_ban72890_footer_activated',
        'label'       => __( 'Enable archive Footer banner (728x90)?', karisma_text_domain ),
        'desc'        => __( 'Please select on for enable Footer banner (728x90) and select off for disable Footer banner (728x90).', karisma_text_domain ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'banner_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => __( 'on', karisma_text_domain ),
            'src'         => ''
            ),
          array(
            'value'       => 'off',
            'label'       => __( 'off', karisma_text_domain ),
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'krs_ban72890_footer',
        'label'       => __( 'Archive footer banner (728x90)', karisma_text_domain ),
        'desc'        => __( 'Fill with banner 728x90 in footer page before widget footer', karisma_text_domain ),
        'std'         => '<a href="https://karismaid.com" title="banner 728x90"><img src="https://storage.googleapis.com/support-kms-prod/SNP_501E7C3D5CA3CA07C641E6BAFB8A53C794CF_2922339_en_v2" alt="banner 728x90" title="banner 728x90" height="90" width="728" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner_tab',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'krs_ban72890_footer_activated:is(on),krs_ban72890_footer_activated:off()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_attachment728_activated',
        'label'       => __( 'Enable Attachment banner before download button 728x90?', karisma_text_domain ),
        'desc'        => __( 'Please select on for enable Attachment banner before download button 728x90 and select off for disable Attachment banner before download button 728x90.', karisma_text_domain ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'banner_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => __( 'on', karisma_text_domain ),
            'src'         => ''
            ),
          array(
            'value'       => 'off',
            'label'       => __( 'off', karisma_text_domain ),
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'krs_attachment728',
        'label'       => __( 'Attachment banner before download button(728x90)', karisma_text_domain ),
        'desc'        => __( 'Fill with banner 728x90 before download button banner in attachment page.', karisma_text_domain ),
        'std'         => '<a href="https://karismaid.com" title="banner 728x90"><img src="https://storage.googleapis.com/support-kms-prod/SNP_501E7C3D5CA3CA07C641E6BAFB8A53C794CF_2922339_en_v2" alt="banner 728x90" title="banner 728x90" height="90" width="728" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner_tab',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'krs_attachment728_activated:is(on),krs_attachment728_activated:off()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_ban46860_shead_activated',
        'label'       => __( 'Enable Single Header banner (728x90)?', karisma_text_domain ),
        'desc'        => __( 'Please select on for enable Single Header banner (728x90) and select off for disable Single Header banner (728x90).', karisma_text_domain ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'banner_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => __( 'on', karisma_text_domain ),
            'src'         => ''
            ),
          array(
            'value'       => 'off',
            'label'       => __( 'off', karisma_text_domain ),
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'krs_ban46860_shead',
        'label'       => __( 'Single Header banner (728x90)', karisma_text_domain ),
        'desc'        => __( 'Fill with header banner 728x90 in single before title', karisma_text_domain ),
        'std'         => '<a href="https://karismaid.com" title="banner 728x90"><img src="https://storage.googleapis.com/support-kms-prod/SNP_501E7C3D5CA3CA07C641E6BAFB8A53C794CF_2922339_en_v2" alt="banner 728x90" title="banner 728x90" height="90" width="728" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner_tab',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'krs_ban46860_shead_activated:is(on),krs_ban46860_shead_activated:off()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_ban46860_stit_activated',
        'label'       => __( 'Enable Single After title banner (728x90)?', karisma_text_domain ),
        'desc'        => __( 'Please select on for enable Single After title banner (728x90) and select off for disable Single After title banner (728x90).', karisma_text_domain ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'banner_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => __( 'on', karisma_text_domain ),
            'src'         => ''
            ),
          array(
            'value'       => 'off',
            'label'       => __( 'off', karisma_text_domain ),
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'krs_ban46860_stit',
        'label'       => __( 'Single After title banner (728x90)', karisma_text_domain ),
        'desc'        => __( 'Fill with after title banner 728x90 in single', karisma_text_domain ),
        'std'         => '<a href="https://karismaid.com" title="banner 728x90"><img src="https://storage.googleapis.com/support-kms-prod/SNP_501E7C3D5CA3CA07C641E6BAFB8A53C794CF_2922339_en_v2" alt="banner 728x90" title="banner 728x90" height="90" width="728" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner_tab',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'krs_ban46860_stit_activated:is(on),krs_ban46860_stit_activated:off()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'krs_ban46860_sfot_activated',
        'label'       => __( 'Enable Single Footer banner (728x90)?', karisma_text_domain ),
        'desc'        => __( 'Please select on for enable Single Footer banner (728x90) and select off for disable Single Footer banner (728x90).', karisma_text_domain ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'banner_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => __( 'on', karisma_text_domain ),
            'src'         => ''
            ),
          array(
            'value'       => 'off',
            'label'       => __( 'off', karisma_text_domain ),
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'krs_ban46860_sfot',
        'label'       => __( 'Single Footer banner (728x90)', karisma_text_domain ),
        'desc'        => __( 'Fill with bottom banner 728x90 in single after post', karisma_text_domain ),
        'std'         => '<a href="https://karismaid.com" title="banner 728x90"><img src="https://storage.googleapis.com/support-kms-prod/SNP_501E7C3D5CA3CA07C641E6BAFB8A53C794CF_2922339_en_v2" alt="banner 728x90" title="banner 728x90" height="90" width="728" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner_tab',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'krs_ban46860_sfot_activated:is(on),krs_ban46860_sfot_activated:off()',
        'operator'    => 'and'
        ),
/* 
  * Karisma Social network
  */
array(
  'label'       => __( 'Enable footer social link?', karisma_text_domain ),
  'id'          => 'krs_head_social_activated',
  'type'        => 'on-off',
  'desc'        => __( 'Please select on for enable footer social and select off for disable footer social.', karisma_text_domain ),
  'choices'     => array(
    array (
      'label'       => 'on',
      'value'       => 'on'
      ),
    array (
      'label'       => 'off',
      'value'       => 'off'
      )
    ),
  'std'         => 'on',
  'section'     => 'social_tab'
  ),

array(
  'label'       => __( 'Enable social shared post?', karisma_text_domain ),
  'id'          => 'krs_active_shared',
  'type'        => 'on-off',
  'desc'        => __( 'Please select on for enable social shared post and select off for disable shared post.', karisma_text_domain ),
  'choices'     => array(
    array (
      'label'       => 'on',
      'value'       => 'on'
      ),
    array (
      'label'       => 'off',
      'value'       => 'off'
      )
    ),
  'std'         => 'on',
  'section'     => 'social_tab'
  ),  
array(
  'label'       => __( 'Facebook application id', karisma_text_domain ),
  'id'          => 'krs_facebook_app_id',
  'type'        => 'text',
  'desc'       => __( 'Fill with your facebook application id. To add a Facebook Comments Box you will need to create a Facebook App first. Go to https://developers.facebook.com/apps/ and create a new app. Enter a name and define the locale for the app.', karisma_text_domain ),
  'std'         => '231372170246816',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Facebook URL', karisma_text_domain ),
  'id'          => 'krs_fb_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your facebook url here, for example https://facebook.com/amrikarisma(use http://).', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Twitter URL', karisma_text_domain ),
  'id'          => 'krs_tweet_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your twitter url here, for example https://twitter.com/amrikarisma(use http://).', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Gplus URL', karisma_text_domain ),
  'id'          => 'krs_gplus_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your google plus url here. For example http://plus.google.com/3894293874219340 (use http://)', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Linkedin URL', karisma_text_domain ),
  'id'          => 'krs_in_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your linkedin url here(use http://).', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Dribble URL', karisma_text_domain ),
  'id'          => 'krs_dribble_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your dribble url here(use http://).', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Flickr URL', karisma_text_domain ),
  'id'          => 'krs_flickr_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your flickr url here(use http://).', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Instagram URL', karisma_text_domain ),
  'id'          => 'krs_instagram_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your Instagram url here(use http://).', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Tumblr URL', karisma_text_domain ),
  'id'          => 'krs_tumblr_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your tumblr url here(use http://).', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'Youtube URL', karisma_text_domain ),
  'id'          => 'krs_youtube_sn',
  'type'        => 'text',
  'desc'       => __( 'Please enter your youtube url here(use http://).', karisma_text_domain ),
  'std'         => '',
  'section'     => 'social_tab'
  ),
array(
  'label'       => __( 'RSS', karisma_text_domain ),
  'id'          => 'krs_rss_sn',
  'type'        => 'on-off',
  'desc'        => __( 'Please select on for enable RSS link and select off for disable RSS link.', karisma_text_domain ),
  'choices'     => array(
    array (
      'label'       => 'on',
      'value'       => 'on'
      ),
    array (
      'label'       => 'off',
      'value'       => 'off'
      )
    ),
  'std'         => 'on',
  'section'     => 'social_tab'
  ),
    array(
    'label'       => __( 'Enable Bulk Upload?', karisma_text_domain ),
    'id'          => 'krs_bulkupload_activated',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable Enable Bulk Upload and select off for disable Enable Bulk Upload.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'bulkpost_tab'
    ),
  /*
  * Single Page setting
  * Featured Image
  */
  array(
    'label'       => __( 'Enable Featured image on Single post?', karisma_text_domain ),
    'id'          => 'krs_featured_img_activated',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable Featured image on Single post and select off for disable Featured image on Single post.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'off',
    'section'     => 'single_tab'
    ),
  array(
    'label'       => __( 'Enable Auto Featured image?', karisma_text_domain ),
    'id'          => 'krs_auto_featured_img_activated',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for set featured image automatically if you forgot set featured image and select off for disable this.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'off',
    'section'     => 'single_tab'
    ),

  array(
    'label'       => __( 'Display Resolution and Viewers?', karisma_text_domain ),
    'id'          => 'krs_meta_info',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable resolution and viewers and select off for disable resolution and viewers.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'single_tab'
    ), 
  array(
    'label'       => __( 'Enable Resolution on Title Single Page?', karisma_text_domain ),
    'id'          => 'krs_title_reso_sp',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable resolution on title Single Page and select off for disable resolution on title Single Page.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'single_tab'
    ),
  array(
    'label'       => __( 'Enable Post Info in Single Post?', karisma_text_domain ),
    'id'          => 'krs_meta_info_single',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable post info in Single Post and select off for disable post info in Single Post.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'single_tab'
    ),
  array(
    'label'       => __( 'Enable meta info after content?', karisma_text_domain ),
    'id'          => 'krs_meta_bottom',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable rmeta info after content and select off for disable meta info after content.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'single_tab'
    ), 
  array(
    'label'       => __( 'Enable download image button in single?', karisma_text_domain ),
    'id'          => 'krs_active_download',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for Enable download image button in single and attachment and select off for disable auto disable download image button in single and attachment.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'single_tab'
    ),   
  array(
    'id'          => 'krs_active_related',
    'label'       => __( 'Enable related post?', karisma_text_domain ),
    'desc'        => __( 'Please select on for enable related post in single and select off for disable related post in single.', karisma_text_domain ),
    'std'         => 'on',
    'type'        => 'on-off',
    'section'     => 'single_tab',
    'rows'        => '',
    'post_type'   => '',
    'taxonomy'    => '',
    'min_max_step'=> '',
    'class'       => '',
    'condition'   => '',
    'choices'     => array( 
      array(
        'value'       => 'on',
        'label'       => __( 'on', karisma_text_domain ),
        'src'         => ''
        ),
      array(
        'value'       => 'off',
        'label'       => __( 'off', karisma_text_domain ),
        'src'         => ''
        )
      )
    ),
  array(
    'id'          => 'krs_taxonomy_relpost',
    'label'       => __( 'Related by taxonomy', karisma_text_domain ),
    'desc'        => __( 'Please select what do you want related by taxonomy.', karisma_text_domain ),
    'std'         => '',
    'type'        => 'select',
    'section'     => 'single_tab',
    'rows'        => '',
    'post_type'   => '',
    'taxonomy'    => '',
    'min_max_step'=> '',
    'class'       => '',
    'condition'   => 'krs_active_related:is(on),krs_active_related:off()',
    'choices'     => array( 
      array(
        'value'       => 'category',
        'label'       => __( 'Category', karisma_text_domain ),
        ),
      array(
        'value'       => 'tags',
        'label'       => __( 'Tags', karisma_text_domain ),
        ),
      array(
        'value'       => 'title',
        'label'       => __( 'Karisma JOSS', karisma_text_domain ),
        )
      )
    ),
  array(
    'id'          => 'krs_taxonomy_count',
    'label'       => __( 'Number of related by taxonomy', karisma_text_domain ),
    'desc'        => __( 'Please select what do you want number of related by taxonomy.', karisma_text_domain ),
    'std'         => '6',
    'type'        => 'text',
    'section'     => 'single_tab',
    'rows'        => '',
    'post_type'   => '',
    'taxonomy'    => '',
    'min_max_step'=> '',
    'class'       => '',
    'condition'   => 'krs_active_related:is(on),krs_active_related:off()',

    ),
 /*
 * Gallery & Attachments
 */     
 array(
  'id'          => 'krs_active_gallery',
  'label'       => __( 'Enable gallery?', karisma_text_domain ),
  'desc'        => __( 'Please select on for enable gallery post in single and select off for disable gallery post in single.', karisma_text_domain ),
  'std'         => 'on',
  'type'        => 'on-off',
  'section'     => 'gallery_tab',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => '',
  'choices'     => array( 
    array(
      'value'       => 'on',
      'label'       => __( 'on', karisma_text_domain ),
      'src'         => ''
      ),
    array(
      'value'       => 'off',
      'label'       => __( 'off', karisma_text_domain ),
      'src'         => ''
      )
    )
  ),
 array(
  'id'          => 'krs_gallery_size',
  'label'       => __( 'size of gallery thumbnail', karisma_text_domain ),
  'desc'        => __( 'Please select size of the gallery will be displayed.', karisma_text_domain ),
  'std'         => 'thumbnail',
  'type'        => 'select',
  'section'     => 'gallery_tab',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => 'krs_active_gallery:is(on),krs_active_gallery:off()',
  'choices'     => array( 
    array(
      'value'       => 'thumbnail',
      'label'       => __( 'Thumbnail', karisma_text_domain ),
      'src'         => ''
      ),
    array(
      'value'       => 'medium',
      'label'       => __( 'Medium', karisma_text_domain ),
      'src'         => ''
      ),
    array(
      'value'       => 'large',
      'label'       => __( 'Large', karisma_text_domain ),
      'src'         => ''
      )
    )
  ),
 array(
  'id'          => 'krs_gallery_count',
  'label'       => __( 'Count gallery post', karisma_text_domain ),
  'desc'        => __( 'Please enter the number of the gallery will be displayed.', karisma_text_domain ),
  'std'         => '6',
  'type'        => 'text',
  'section'     => 'gallery_tab',
  'rows'        => '',
  'post_type'   => '',
  'taxonomy'    => '',
  'min_max_step'=> '',
  'class'       => '',
  'condition'   => 'krs_active_gallery:is(on),krs_active_gallery:off()',

  ),
  /* 
  * Karisma comment
  */
  array(
    'label'       => __( 'Enable Facebook comment?', karisma_text_domain ),
    'id'          => 'krs_facebook_com_activated',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable Facebook comment and select off for disable Facebook comment.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'comment_tab'
    ),
  array(
    'label'       => __( 'Enable Default comment?', karisma_text_domain ),
    'id'          => 'krs_def_com_activated',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable Default comment and select off for disable Default comment.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'comment_tab'
    ),

  /* 
  * Karisma Auto content
  */
  array(
    'label'       => __( 'Enable auto description?', karisma_text_domain ),
    'id'          => 'krs_active_autocontent',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable auto description in single and attachment and select off for disable auto description in single and attachment.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'autocontent_tab'
    ),   
  array(
    'label'       => __( 'Auto content text before image post (first paragraph)', karisma_text_domain ),
    'id'          => 'krs_wall_autocontent_before',
    'type'        => 'textarea',
    'desc'        => __( '<strong>Auto content text, shortcodes:</strong> %krshomeurl%=home url, %krsblogname%=blogname, %krsblogdescription%=blog description, %krspermalink%=permalink, %krstitle%=title, %krsdate%=date, %krsauthor%=author, %krscategory%=category, %krsblogname%=tag list, %krsview%=Number view post, %krssize%=Size Attachments, <strong>SPINTEXT :</strong> {Text1|Text2|Text3|Text4}', karisma_text_domain ),
    'std'         => '<p>%krstitle% is free HD wallpaper. This wallpaper was upload at %krsdate% upload by %krsauthor% in %krscategory%.</p>',
    'rows'        => '10',
    'condition'   => 'krs_active_autocontent:is(on),krs_active_autocontent:off()',
    'section'     => 'autocontent_tab'
    ),
  array(
    'label'       => __( 'Auto content text after image post (second paragraph)', karisma_text_domain ),
    'id'          => 'krs_wall_autocontent',
    'type'        => 'textarea',
    'desc'        => __( '<strong>Auto content text, shortcodes:</strong> %krshomeurl%=home url, %krsblogname%=blogname, %krsblogdescription%=blog description, %krspermalink%=permalink, %krstitle%=title, %krsdate%=date, %krsauthor%=author, %krscategory%=category, %krsblogname%=tag list, %krsview%=Number view post, %krssize%=Size Attachments, <strong>SPINTEXT :</strong> {Text1|Text2|Text3|Text4}', karisma_text_domain ),
    'std'         => '<p><i>%krstitle%</i> is high definition wallpaper and size this <a href="http://en.wikipedia.org/wiki/Wallpaper_%28computing%29" target="_blank">wallpaper</a> is %krsresolution%. You can make <strong>%krstitle%</strong> For your Desktop {Background|Wallpaper|image background|picture}, Tablet, Android or iPhone and another Smartphone device for free. To download and obtain the %krstitle% images by click the download button below to get multiple high-resversions.</p>',
    'rows'        => '10',
    'condition'   => 'krs_active_autocontent:is(on),krs_active_autocontent:off()',
    'section'     => 'autocontent_tab'
    ),
  array(
    'label'       => __( 'Auto content text third paragraph only in attachment', karisma_text_domain ),
    'id'          => 'krs_wall_autocontent_threep',
    'type'        => 'textarea',
    'desc'        => __( '<strong>Auto content text, shortcodes:</strong> %krshomeurl%=home url, %krsblogname%=blogname, %krsblogdescription%=blog description, %krspermalink%=permalink, %krstitle%=title, %krsdate%=date, %krsauthor%=author, %krscategory%=category, %krsblogname%=tag list, %krsview%=Number view post, %krssize%=Size Attachments, <strong>SPINTEXT :</strong> {Text1|Text2|Text3|Text4}', karisma_text_domain ),
    'std'         => '<p>%krstitle% - We hope that , by posting this <em>%krstitle%</em> , we can fulfill your needs of inspiration for designing your home. If you need more ideas to%krsblogname%, you can check at our collection right below this post.</p>',
    'rows'        => '10',
    'condition'   => 'krs_active_autocontent:is(on),krs_active_autocontent:off()',
    'section'     => 'autocontent_tab'
    ),



  /* 
  * Karisma other setting
  */
  
  array(
    'label'       => __( 'Enable disclaimer?', karisma_text_domain ),
    'id'          => 'krs_wall_disclaime_active',
    'type'        => 'on-off',
    'desc'        => __( 'Please select on for enable disclaimer and select off for disable disclaimer.', karisma_text_domain ),
    'choices'     => array(
      array (
        'label'       => 'on',
        'value'       => 'on'
        ),
      array (
        'label'       => 'off',
        'value'       => 'off'
        )
      ),
    'std'         => 'on',
    'section'     => 'other_tab'
    ),   
  array(
    'label'       => __( 'disclaimer', karisma_text_domain ),
    'id'          => 'krs_wall_disclaimer',
    'type'        => 'textarea',
    'desc'        => __( 'Please fill text disclaimer in footer, this is for your disclaimer website rule.', karisma_text_domain ),
    'std'         => 'DISCLAIMER: This image is provided only for personal use. If you found any images copyrighted to yours, please contact us and we will remove it. We don\'t intend to display any copyright protected images.',
    'rows'        => '10',
    'condition'   => 'krs_wall_disclaime_active:is(on),krs_wall_disclaime_active:off()',
    'section'     => 'other_tab'
    ),
    /* SEO */
  array(
    'label'       => __( 'SEO', karisma_text_domain ),
    'id'          => 'krs_seo_homepage',
    'type'        => 'textarea',
    'desc'        => __( 'Please fill text disclaimer in footer, this is for your disclaimer website rule.', karisma_text_domain ),
    'std'         => 'DISCLAIMER: This image is provided only for personal use. If you found any images copyrighted to yours, please contact us and we will remove it. We don\'t intend to display any copyright protected images.',
    'rows'        => '10',
    'condition'   => '',
    'section'     => 'seo_tab'
    ),
  array(
    'label'       => __( 'System information', karisma_text_domain ),
    'id'          => 'krs_textblock',
    'type'        => 'textblock',
    'desc'        => krs_themes_info(),
    'section'     => 'themeinfo_tab'
    ),
  array(
    'label'       => __( 'Theme License', karisma_text_domain ),
    'id'          => 'krs_textlicense',
    'type'        => 'textblock',
    'desc'        => krs_license(),
    'section'     => 'license_tab'
    ),
  )
);

/* allow settings to be filtered before saving */
$custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );

/* settings are not the same update the DB */
if ( $saved_settings !== $custom_settings ) {
  update_option( 'option_tree_settings', $custom_settings ); 
}

}