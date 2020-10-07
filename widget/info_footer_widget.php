<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 9:46 SA
 */

class InfoFooterWidget extends WP_Widget {
    //Insert functions here
    function __construct() {

        parent::__construct(
            // widget ID
            'info_footer_widget',
            // widget name
            __('InfoFooterWidget', TEXTDOMAIN),
            // widget description
            array( 'description' => __( 'Florist Custom Widget', TEXTDOMAIN ), )
        );

    }

    public function widget( $args, $instance ) {

        $address = $instance['address'] ? apply_filters( 'widget_address', $instance['address'] ) : "Please add your address";
        $phone = $instance['phone'] ? apply_filters( 'widget_phone', $instance['phone'] ) : "Please add your phone";
        $mail = $instance['mail'] ? apply_filters( 'widget_mail', $instance['mail'] ) : "Please add your mail";
        $facebook = $instance['facebook'] ? apply_filters( 'widget_facebook', $instance['facebook'] ) : "Please add your facebook link";
        $instagram = $instance['instagram'] ? apply_filters( 'widget_instagram', $instance['instagram'] ) : "Please add your instagram link";
        $linkedin = $instance['linkedin'] ? apply_filters( 'widget_linkedin', $instance['linkedin'] ) : "Please add your linkedin link";
        $twitter = $instance['twitter'] ? apply_filters( 'widget_twitter', $instance['mail'] ) : "Please add your twitter link";
        $youtube = $instance['youtube'] ? apply_filters( 'widget_youtube', $instance['youtube'] ) : "Please add your youtube link";

        echo '<ul class="list-dc">
            <li><span> <img src="'.THEME_URL_URI .'/assets/img/dc.png" alt=""></span>
                <p>'.$address.'</p>
            </li>
            <li><span> <img src="'.THEME_URL_URI .'/assets/img/phone.png" alt=""></span>
                <p>'.$phone.'</p>
            </li>
            <li><span> <img src="'.THEME_URL_URI .'/assets/img/mail.png" alt=""></span>
                <p>'.$mail.'</p>
            </li>
            <li>
                <a href="'.$facebook.'" title="Facebook"> <img src="'. THEME_URL_URI .'/assets/img/face.png" alt=""></a>
                <a href="'.$instagram.'" title="Instagram"> <img src="'. THEME_URL_URI . '/assets/img/ins.png" alt=""></a>
                <a href="'.$linkedin.'" title="Linkedin"> <img src="'. THEME_URL_URI . '/assets/img/icon3.png" alt=""></a>
                <a href="'.$twitter.'" title="Twitter"> <img src="'. THEME_URL_URI . '/assets/img/icon4.png" alt=""></a>
                <a href="'.$youtube.'" title="Youtube"> <img src="'. THEME_URL_URI . '/assets/img/icon5.png" alt=""></a>
            </li>
        </ul>';

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
        $instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
        $instance['mail'] = ( ! empty( $new_instance['mail'] ) ) ? strip_tags( $new_instance['mail'] ) : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
        $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
        $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
        $instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';

        return $instance;

    }

    public function form( $instance ) {

        $this->widget_form_render('address', $instance[ 'address' ], 'Please add your address', 'Address:');
        $this->widget_form_render('phone', $instance[ 'phone' ], 'Please add your phone', 'Phone:');
        $this->widget_form_render('mail', $instance[ 'mail' ], 'Please add your mail', 'Mail:');
        $this->widget_form_render('facebook', $instance[ 'facebook' ], 'Please add your facebook link', 'Facebook Link:');
        $this->widget_form_render('instagram', $instance[ 'instagram' ], 'Please add your instagram link', 'Instagram Link:');
        $this->widget_form_render('linkedin', $instance[ 'linkedin' ], 'Please add your linkedin link', 'Linkedin Link:');
        $this->widget_form_render('twitter', $instance[ 'twitter' ], 'Please add your twitter link', 'Twitter Link:');
        $this->widget_form_render('youtube', $instance[ 'youtube' ], 'Please add your youtube link', 'Youtube URL:');
    }

    //  func: widget_form_render() => render widget admin wiew
    //  params:
    //  $name => the field name
    //  $de
    private function widget_form_render($name = '', $inst = '', $default = 'Default Text', $label = 'Label') {

        if ( isset( $inst ) )
            $wname = $inst;
        else
            $wname = __( $default, TEXTDOMAIN );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( $name ); ?>"><?php _e( $label ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( $name ); ?>" name="<?php echo $this->get_field_name( $name ); ?>" type="text" value="<?php echo esc_attr( $wname ); ?>" />
        </p>
        <?php

    }
}