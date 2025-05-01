<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Http;


class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|max:3000',
            'g-recaptcha-response' => ['required', new Recaptcha()],
        ]);


        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        if (!$response->json('success') || $response->json('score') < 0.5) {
            return response('❌ فشل التحقق من reCAPTCHA.', 422);
        }


        $name    = $request->input('name');
        $email   = $request->input('email');
        $message = $request->input('message');

        $direction = $this->detectDirection($message);

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = env('MAIL_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = env('MAIL_USERNAME');
            $mail->Password   = env('MAIL_PASSWORD');
            $mail->SMTPSecure = 'tls';
            $mail->Port       = env('MAIL_PORT');
            $mail->CharSet    = 'UTF-8';
            $mail->Encoding   = 'base64';

            $mail->setFrom(env('MAIL_USERNAME'), 'GayahTech');
            $mail->addAddress(env('MAIL_USERNAME'));
            $mail->addReplyTo($email, $name);
            $mail->FromName = $name;

            $mail->Subject = "New Contact Message from $name";

            $mail->isHTML(true);
            $mail->Body = view('website.emails.contact', [
                'data' => compact('name', 'email', 'message'),
                'direction' => $direction
            ])->render();

            $mail->AltBody = "New message from $name\n\nEmail: $email\n\nMessage:\n" . strip_tags($message);

            $mail->send();
            return response("✅ تم إرسال الرسالة بنجاح", 200);
        } catch (Exception $e) {
            return response("❌ فشل الإرسال: " . $mail->ErrorInfo, 500);
        }
    }

    private function detectDirection($text)
    {
        return preg_match('/[\x{0600}-\x{06FF}]/u', $text) ? 'rtl' : 'ltr';
    }
}
