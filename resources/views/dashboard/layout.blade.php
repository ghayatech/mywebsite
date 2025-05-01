<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.dashboard') }}</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <h2 class="logo">لوحة التحكم</h2>
            <ul class="menu">
                <li><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
                <li><a href="{{ route('dashboard.menus.index') }}">ادارة القائمة</a></li>
                <li><a href="{{ route('dashboard.hero.index') }}">قسم البطل</a></li>
                <li><a href="{{ route('dashboard.statistics.index') }}">إحصائيات الشركة</a></li>
                <li><a href="{{ route('dashboard.services.index') }}">الخدمات</a></li>
                <li><a href="{{ route('dashboard.about.edit') }}">حولنا</a></li>
                <li><a href="{{ route('dashboard.team.index') }}">فريق العمل</a></li>

            </ul>
        </aside>

        <main class="main-content">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
