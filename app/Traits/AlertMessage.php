<?php
namespace App\Traits;

use App\Alert;
use App\AlertType;

trait AlertMessage {
    public function alerts($id)
    {
      $alerts = Alert::where('alert_for',$id)->where('status','1')->get();
      $default_alerts = Alert::where('alert_for','0')->where('status','1')->get();

      $types=AlertType::all();

        foreach($types as $type)
        {
          foreach($alerts as $alert)
          {
            if(($alert->alert_type == $type->id) && ($alert->alert_for != '0'))
            {
                $alert_message_value[$alert->alert_type]['message']=$alert->alert_message;
                $alert_message_value[$alert->alert_type]['title']=$alert->alert_title;
            }
          }
        }

        foreach($default_alerts as $default_alert)
        {
            $default_value[$default_alert->alert_type]['message']=$default_alert->alert_message;
            $default_value[$default_alert->alert_type]['title']=$default_alert->alert_title;
        }

        if(!empty($alert_message_value))
        {

          $values=array_diff_key($default_value,$alert_message_value);
          $alert_message=$alert_message_value + $values;
        }
        else
        {
          $alert_message=$default_value;
        }


        return $alert_message;
    }


}