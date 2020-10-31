<?php namespace Gms\Feedback\Components;

use Cms\Classes\ComponentBase;
use Gms\Feedback\Models\Feedback;
use Gms\Feedback\Models\Request as Requests;
use Gms\Feedback\Models\Input;
use Gms\Feedback\Models\Send;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Mail;

class Feedbacks extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Feedback',
            'description' => 'Feedback component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

     public function onViewForm()
    {
        $feedback_id = post('id');
        $this->page['sfeedbacks'] = Feedback::where('id','=', $feedback_id)->get();
        return [
                '#feedbackst' => $this->renderPartial('feedbackjs'),
            ];
    }

    public function onSendMail()
    {
        // Start initialization values ----------------------------------------------------

        $feedback_id = post('id_form');
        $text = '<table class="gms-table"><tbody>';
        $form_title = '';

        // Get form and info title --------------------------------------------------------

        $forms = Feedback::where('id','=', $feedback_id)->get();
        foreach ($forms as $form)
            $form_title = $form->title;

        // Get Inputs via form ------------------------------------------------------------

        $results = Input::whereHas('feedback', function($filter) use ($feedback_id){
                    $filter->where('id', '=', $feedback_id);
                })->where('is_active', '=', 1)->get();

        foreach ($results as $result)
           $text = $text.'<tr><td>'.$result->title.'</td><td>'.post($result->name)."</td></tr>";

        $text = $text.'</tbody></table>';

        // Insert request into table Request and send mail --------------------------------

        $get_mails = Send::whereHas('feedback_mails', function($filter) use ($feedback_id){
            $filter->where('id', '=', $feedback_id);
        })->get();

        $insert_request = Requests::insertGetId(
            [
                'created_at' => date("Ymdhis"), 
                'title' => $form_title, 
                'description' => $text,
            ]
        );

        //$results->appends(['game' => 1, 'category' => 3])->render();
        //$result->appends(request('?dasdasd'));
        //$result->request()->fullUrlWithQuery(['y' => 'mx+c']);
        $collection = [
            'info_header' => 'Заявка с лендинга Mebelbor',
            'ip_info' => $_SERVER['REMOTE_ADDR'],
            'datetime' => date("Ymdhis"),
            'title'    => $form->title,
            'description' => $text,
        ];

        // foreach ($get_mails as $get_mail){
        //     $mail_send = Mail::send('gms.feedback::mail.message', $collection, function($message) {
        //         $message->to($get_mail->title, 'Admin Person');
        //         $message->subject('Заявка с лендинга Mebelbor');
        //     });
        // }

        // if($insert_request and $mail_send) dd($lol = 'complete');
        // else dd($lol = 'error');

        $this->page['success_form'] = "1";
        return [
                '#feedbackst' => $this->renderPartial('feedbackjs'),
                url('modes',['game' => 1,'category' => 3,'page' => 6]),
            ];
    }
}
