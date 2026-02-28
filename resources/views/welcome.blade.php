<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modul Pertemuan 2</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />

        <style>
            *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
            html, body { height: 100%; overflow: hidden; }

            body {
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                background-color: #ffffff;
            }

            /* ── Carousel wrapper ── */
            .carousel {
                display: flex;
                width: 300vw;
                height: 100vh;
                transition: transform 0.5s cubic-bezier(0.77, 0, 0.175, 1);
            }

            /* ── Each slide ── */
            .slide {
                width: 100vw;
                height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 2rem;
                position: relative;
            }

            .slide-1 { background-color: #ffffff; }
            .slide-2 { background-color: #0f172a; }
            .slide-3 { background-color: #0f172a; }

            /* ── Slide 1 – Welcome ── */
            .card {
                width: 100%;
                max-width: 860px;
                background-color: #f5f5f5;
                border: 1px solid #e0e0e0;
                border-radius: 14px;
                padding: 3rem 3.5rem;
                text-align: left;
            }
            .card-name {
                font-size: 1.25rem;
                font-weight: 600;
                color: #1b1b18;
                margin-bottom: 0.3rem;
                letter-spacing: 0.01em;
            }
            .card-nim  {
                font-size: 1rem;
                color: #888888;
                margin-bottom: 2rem;
            }
            .btn-primary {
                display: inline-block;
                background-color: #1b1b18;
                color: #ffffff;
                font-size: 0.875rem;
                font-weight: 500;
                padding: 0.6rem 1.5rem;
                border-radius: 8px;
                border: none;
                cursor: pointer;
                text-decoration: none;
                transition: background-color 0.15s;
                font-family: inherit;
            }
            .btn-primary:hover { background-color: #333; }

            /* ── Auth card styles ── */
            .auth-card {
                width: 100%;
                max-width: 400px;
                background-color: #1e293b;
                border-radius: 12px;
                padding: 2.5rem 2rem;
            }
            .laravel-logo {
                display: flex;
                justify-content: center;
                margin-bottom: 1.5rem;
            }
            .laravel-logo svg {
                width: 52px;
                height: 52px;
                color: #FF2D20;
            }
            .field { margin-bottom: 1rem; }
            .field label {
                display: block;
                font-size: 0.8rem;
                color: #cbd5e1;
                margin-bottom: 0.35rem;
            }
            .field input {
                width: 100%;
                background-color: #0f172a;
                border: 1px solid #334155;
                border-radius: 6px;
                color: #f1f5f9;
                padding: 0.55rem 0.75rem;
                font-size: 0.875rem;
                outline: none;
            }
            .field input:focus { border-color: #6366f1; }
            .remember-row {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                margin-bottom: 1.2rem;
                font-size: 0.8rem;
                color: #94a3b8;
            }
            .auth-footer {
                display: flex;
                justify-content: flex-end;
                align-items: center;
                gap: 1rem;
            }
            .link-muted {
                font-size: 0.8rem;
                color: #94a3b8;
                text-decoration: none;
            }
            .link-muted:hover { text-decoration: underline; color: #f1f5f9; }
            .btn-auth {
                background-color: #f8fafc;
                color: #0f172a;
                border: none;
                border-radius: 6px;
                padding: 0.5rem 1.2rem;
                font-weight: 600;
                cursor: pointer;
            }

            /* ── Navigation ── */
            .arrow {
                position: fixed;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(0,0,0,0.1);
                border: none;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                z-index: 100;
            }
            .arrow:hover { background: rgba(0,0,0,0.2); }
            .arrow-left  { left: 1.5rem; }
            .arrow-right { right: 1.5rem; }
            .hidden { display: none; }

            .dots {
                position: fixed;
                bottom: 2rem;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 0.75rem;
                z-index: 100;
            }
            .dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #cbd5e1;
                cursor: pointer;
            }
            .dot.active { background: #6366f1; transform: scale(1.2); }

            .slide-label {
                position: fixed;
                top: 1.5rem;
                left: 2rem;
                font-weight: 600;
                z-index: 100;
                text-transform: uppercase;
                letter-spacing: 0.1em;
            }
        </style>
    </head>

    <body>
        <div class="slide-label" id="slideLabel">Welcome</div>

        <button class="arrow arrow-left hidden" id="arrowLeft" onclick="moveSlide(-1)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
        </button>

        <button class="arrow arrow-right" id="arrowRight" onclick="moveSlide(1)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        </button>

        <div class="dots">
            <div class="dot active" onclick="goSlide(0)"></div>
            <div class="dot" onclick="goSlide(1)"></div>
            <div class="dot" onclick="goSlide(2)"></div>
        </div>

        <div class="carousel" id="carousel">
            <div class="slide slide-1">
                <div class="card">
                    <p class="card-name">LINDA PERMATA SARI</p>
                    <p class="card-nim">20230140086</p>
                    <a href="{{ route('about') }}" class="btn-primary">Mulai Modul 2</a>
                </div>
            </div>

            <div class="slide slide-2">
                <div class="auth-card">
                    <div class="laravel-logo">
                        <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5019C61.8897 28.9283 61.6533 29.3212 61.2743 29.5348L49.4679 36.3264V49.9425C49.4679 50.369 49.2313 50.762 48.8522 50.9733L25.9496 63.4813C25.6257 63.6622 25.2306 63.6622 24.9067 63.4813C24.7788 63.4074 24.6534 63.3287 24.5325 63.2452L14.3092 57.1168C13.8932 56.8717 13.6432 56.4282 13.6432 55.9503C13.6432 55.4724 13.8932 55.0289 14.3092 54.7838L25.9496 48.0263C26.3284 47.8127 26.5648 47.4196 26.5648 46.9933V33.5872L14.7585 26.7957C14.3795 26.5822 14.143 26.1891 14.143 25.7627V12.1466C14.143 12.0588 14.1547 11.9714 14.1775 11.8867L24.9067 5.76013C25.4543 5.43747 26.1416 5.43747 26.6889 5.76013L56.6443 22.7607L61.8548 14.6253ZM48.4544 34.9879V21.8799L37.0316 28.5397V41.8176L48.4544 34.9879ZM25.5648 49.4819L14.1421 42.6245L14.1421 55.9327L25.5648 62.7898V49.4819ZM26.5648 47.7857L37.9879 54.5752V41.3177L26.5648 34.6481V47.7857ZM26.5648 32.9524L37.9879 39.6421L48.4544 33.3444L37.0316 26.6848L26.5648 32.9524Z" fill="currentColor"/></svg>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field"><label>Email</label><input type="email" name="email" required></div>
                        <div class="field"><label>Password</label><input type="password" name="password" required></div>
                        <div class="remember-row"><input type="checkbox" id="remember" name="remember"><label for="remember">Remember me</label></div>
                        <div class="auth-footer"><button type="submit" class="btn-auth">LOG IN</button></div>
                    </form>
                </div>
            </div>

            <div class="slide slide-3">
                <div class="auth-card">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="field"><label>Name</label><input type="text" name="name" required></div>
                        <div class="field"><label>Email</label><input type="email" name="email" required></div>
                        <div class="field"><label>Password</label><input type="password" name="password" required></div>
                        <div class="field"><label>Confirm Password</label><input type="password" name="password_confirmation" required></div>
                        <div class="auth-footer">
                            <a class="link-muted" href="#" onclick="goSlide(1)">Sudah punya akun?</a>
                            <button type="submit" class="btn-auth">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            const slides = [
                { label: 'Welcome', color: '#1b1b18' },
                { label: 'Login', color: '#f1f5f9' },
                { label: 'Register', color: '#f1f5f9' }
            ];
            let current = 0;
            const carousel = document.getElementById('carousel');
            const slideLabel = document.getElementById('slideLabel');

            function goSlide(index) {
                current = index;
                carousel.style.transform = `translateX(-${current * 100}vw)`;
                document.getElementById('arrowLeft').classList.toggle('hidden', current === 0);
                document.getElementById('arrowRight').classList.toggle('hidden', current === 2);
                
                document.querySelectorAll('.dot').forEach((dot, i) => {
                    dot.classList.toggle('active', i === current);
                });

                slideLabel.textContent = slides[current].label;
                slideLabel.style.color = slides[current].color;
            }

            function moveSlide(step) { goSlide(current + step); }
        </script>
    </body>
</html>