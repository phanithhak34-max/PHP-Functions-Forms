<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions &amp; Forms | Educational Dashboard</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --primary-border: #bfdbfe;
            --bg-page: #f8fafc;
            --bg-card: #ffffff;
            --text-heading: #0f172a;
            --text-body: #334155;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --border-hover: #93c5fd;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 12px 24px -4px rgba(37, 99, 235, 0.12), 0 4px 8px -2px rgba(0, 0, 0, 0.04);
            --radius-md: 12px;
            --radius-lg: 16px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: var(--bg-page);
            color: var(--text-body);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-heading);
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: -0.02em;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), #1d4ed8);
            color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
        }

        .nav-badge {
            background-color: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
            padding: 6px 14px;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Main Container */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2.75rem 1.5rem 4.5rem;
            flex: 1;
            width: 100%;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            max-width: 760px;
            margin: 0 auto 3rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background-color: var(--primary-light);
            color: var(--primary);
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            border: 1px solid var(--primary-border);
        }

        .hero h1 {
            font-size: clamp(2.1rem, 4.5vw, 2.85rem);
            font-weight: 800;
            color: var(--text-heading);
            letter-spacing: -0.03em;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--text-muted);
            line-height: 1.65;
        }

        /* Section Heading */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
            flex-wrap: wrap;
            gap: 1rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1rem;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-heading);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-count {
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
            background-color: #f1f5f9;
            padding: 4px 12px;
            border-radius: 9999px;
        }

        /* Exercise Cards Grid (3 Columns on Desktop) */
        .exercises-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        /* Exercise Card */
        .card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            box-shadow: var(--shadow-sm);
            transition: transform 0.22s ease, border-color 0.22s ease, box-shadow 0.22s ease;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: var(--border-hover);
            box-shadow: var(--shadow-hover);
        }

        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            background-color: var(--primary-light);
            color: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            border: 1px solid var(--primary-border);
            transition: all 0.22s ease;
        }

        .card:hover .card-icon {
            background-color: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
        }

        .number-badge {
            background-color: #f1f5f9;
            color: #3b82f6;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            border: 1px solid #e2e8f0;
        }

        .card:hover .number-badge {
            background-color: var(--primary-light);
            border-color: var(--primary-border);
        }

        .card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-heading);
            margin-bottom: 0.5rem;
            line-height: 1.35;
        }

        .card p {
            font-size: 0.925rem;
            color: var(--text-muted);
            line-height: 1.55;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .card-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            font-size: 0.925rem;
            text-decoration: none;
            border-radius: 10px;
            border: 1px solid var(--primary-border);
            transition: all 0.2s ease;
        }

        .card:hover .card-btn {
            background-color: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .card-btn i {
            transition: transform 0.2s ease;
            font-size: 0.85rem;
        }

        .card:hover .card-btn i {
            transform: translateX(4px);
        }

        /* Footer */
        footer {
            background-color: #ffffff;
            border-top: 1px solid var(--border-color);
            padding: 1.75rem 1.5rem;
            margin-top: auto;
            text-align: center;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .footer-author {
            color: #2563eb;
            font-weight: 600;
        }

        .footer-sub {
            font-size: 0.825rem;
            color: #94a3b8;
        }

        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .exercises-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .exercises-grid {
                grid-template-columns: 1fr;
            }
            .nav-container {
                padding: 0.875rem 1rem;
            }
            .nav-badge {
                display: none;
            }
            .hero h1 {
                font-size: 1.85rem;
            }
            .hero p {
                font-size: 0.975rem;
            }
            .footer-container {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Simple Navigation Bar -->
    <header class="navbar">
        <div class="nav-container">
            <a href="index.php" class="nav-brand">
                <div class="brand-icon">
                    <i class="fa-solid fa-code"></i>
                </div>
                <span>PHP Functions &amp; Forms</span>
            </a>
            <div class="nav-badge">
                <i class="fa-solid fa-graduation-cap"></i> 10 Interactive Exercises
            </div>
        </div>
    </header>

    <!-- Main Dashboard Content -->
    <main class="main-container">
        <!-- Hero Header -->
        <section class="hero">
            <div class="hero-badge">
                <i class="fa-solid fa-laptop-code"></i> PHP Course Assignment
            </div>
            <h1>Interactive <span>PHP Functions</span> &amp; Forms</h1>
            <p>Explore 10 practical examples demonstrating PHP functions, GET form submissions, and input validation with clean user interfaces.</p>
        </section>

        <!-- Exercises Section -->
        <section>
            <div class="section-header">
                <div class="section-title">
                    <i class="fa-solid fa-layer-group" style="color: var(--primary);"></i>
                    <span>Exercise Modules</span>
                </div>
                <span class="section-count">10 Exercises Total</span>
            </div>

            <!-- 3-Column Grid -->
            <div class="exercises-grid">

                <!-- Exercise 01 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <span class="number-badge">01</span>
                    </div>
                    <h3>Add Two Numbers</h3>
                    <p>Combine two numeric values and calculate their sum using a reusable PHP function.</p>
                    <a href="function01.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 02 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-minus"></i>
                        </div>
                        <span class="number-badge">02</span>
                    </div>
                    <h3>Subtract Two Numbers</h3>
                    <p>Find the difference between two numbers with an interactive subtraction function.</p>
                    <a href="function02.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 03 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <span class="number-badge">03</span>
                    </div>
                    <h3>Multiply Two Numbers</h3>
                    <p>Multiply two values together and display the calculated product via form inputs.</p>
                    <a href="function03.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 04 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-divide"></i>
                        </div>
                        <span class="number-badge">04</span>
                    </div>
                    <h3>Divide Two Numbers</h3>
                    <p>Perform safe division with input validation that prevents division by zero.</p>
                    <a href="function04.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 05 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-superscript"></i>
                        </div>
                        <span class="number-badge">05</span>
                    </div>
                    <h3>Calculate Square</h3>
                    <p>Calculate the square of any number by multiplying the value by itself.</p>
                    <a href="function05.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 06 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-cube"></i>
                        </div>
                        <span class="number-badge">06</span>
                    </div>
                    <h3>Calculate Cube</h3>
                    <p>Raise a number to the third power using a simple custom PHP function.</p>
                    <a href="function06.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 07 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </div>
                        <span class="number-badge">07</span>
                    </div>
                    <h3>Check Even or Odd</h3>
                    <p>Determine whether a whole integer is even or odd using modulo logic in PHP.</p>
                    <a href="function07.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 08 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-arrow-up-right-dots"></i>
                        </div>
                        <span class="number-badge">08</span>
                    </div>
                    <h3>Find Maximum</h3>
                    <p>Compare two numerical values and determine the larger number with PHP.</p>
                    <a href="function08.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 09 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-temperature-half"></i>
                        </div>
                        <span class="number-badge">09</span>
                    </div>
                    <h3>Convert Celsius to Fahrenheit</h3>
                    <p>Convert temperatures between scales using the standard formula: (C &times; 9/5) + 32.</p>
                    <a href="function09.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

                <!-- Exercise 10 -->
                <article class="card">
                    <div class="card-top">
                        <div class="card-icon">
                            <i class="fa-solid fa-vector-square"></i>
                        </div>
                        <span class="number-badge">10</span>
                    </div>
                    <h3>Calculate Rectangle Area</h3>
                    <p>Compute the geometric area of a rectangle from user-provided width and height.</p>
                    <a href="function10.php" class="card-btn">
                        <span>Open Exercise</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>

            </div>
        </section>
    </main>

    <!-- Simple Footer -->
    <footer>
        <div class="footer-container">
            <div>&copy; 2026 PHP Functions &amp; Forms | Developed by <span class="footer-author">Hak Phanith</span></div>
            <div class="footer-sub">Computer Science &bull; Angkor University</div>
        </div>
    </footer>

</body>
</html>