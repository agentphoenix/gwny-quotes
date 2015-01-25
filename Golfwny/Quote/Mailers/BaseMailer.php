<?php namespace Quote\Mailers;

use Illuminate\Mail\Mailer;

abstract class BaseMailer {

	protected $mailer;

	public function __construct(Mailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function send($view, array $data)
	{
		return $this->mailer->send("emails.$view", $data, function($msg) use ($data)
		{
			$msg->to($data['to'])
				->subject(config('gwny.email.subject').$data['subject']);

			if (array_key_exists('fromEmail', $data))
			{
				$msg->from($data['fromEmail'], $data['fromName']);
			}
		});
	}

}
