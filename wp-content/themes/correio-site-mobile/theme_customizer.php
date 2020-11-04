<?php
new ThemeCustomizer();

class ThemeCustomizer
{
    public function __construct()
    {
        //add_action ('admin_menu', array(&$this, 'customizerAdmin'));
        add_action( 'customize_register', array(&$this, 'customizerManager' ));
    }

    /**
     * Add the Customize link to the admin menu
     * @return void
     */
    public function customizerAdmin() {
        add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
    }

    /**
     * Customizer manager demo
     * @param  WP_customizerManager $wp_manager
     * @return void
     */
    public function customizerManager( $wp_manager ) {
        $this->customizerSection( $wp_manager );
        $this->registerControls( $wp_manager );
    }

    public function registerControls( $wp_manager ) {

        // Color Picker
        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'color_setting', array(
            'label'   => 'Cor do site',
            'section' => 'customizer_section',
            'settings'   => 'color_setting',
            'priority' => 2
        ) ) );

    }

    public function customizerSection( $wp_manager )
    {
        $wp_manager->add_section( 'customizer_section', array(
            'title'          => 'Configurações do Site',
            'priority'       => 1,
        ) );

        // Color control
        $wp_manager->add_setting( 'color_setting', array(
            'default' => '#000000',
        ));
    }

}

?>