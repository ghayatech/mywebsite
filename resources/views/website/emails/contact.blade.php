<div dir="{{ $direction }}"
    style="font-family: Arial, sans-serif; padding: 20px; background-color: #f5f5f5; color: #333;">
    <div
        style="max-width: 600px; margin: auto; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #4CAF50;">📬 رسالة جديدة من الموقع</h2>
        <p><strong>👤 الاسم:</strong> {{ $data['name'] }}</p>
        <p><strong>📧 البريد الإلكتروني:</strong> {{ $data['email'] }}</p>
        <p><strong>💬 الرسالة:</strong></p>
        <div style="background-color:#f9f9f9; padding:15px; border-left:4px solid #4CAF50; border-radius:5px;"
            dir="auto">
            <p style="margin:0;">{{ $data['message'] }}</p>
        </div>
        <hr style='margin:30px 0;'>
        <p style="font-size: 12px; color: #888;">تم الإرسال من نموذج التواصل في موقعك.</p>
    </div>
</div>
