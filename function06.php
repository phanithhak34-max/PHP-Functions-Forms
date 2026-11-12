<?php
function cubeNumber($n) { return $n * $n * $n; }
$title = 'Calculate Cube';
$description = 'Enter a number and raise it to the third power with a PHP function.';
$fields = ['a' => ['Number', '3']];
$inputValues = [];
$error = '';
$result = null;

if (isset($_GET['calculate']) || array_key_exists('a', $_GET) || array_key_exists('b', $_GET)) {
    $raw = $_GET['a'] ?? null;
    if (is_string($raw)) { $inputValues['a'] = $raw; }
    if (!is_string($raw) || trim($raw) === '' || !is_numeric(trim($raw))) {
        $error = 'Please enter a valid number.';
    } else {
        $number = (float)trim($raw);
        if (!is_finite($number)) {
            $error = 'Please enter a number within the supported range.';
        } else {
            $result = cubeNumber($number);
            if (!is_finite((float)$result)) { $result = null; $error = 'The result is outside the supported range.'; }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 06: <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?> | PHP Functions &amp; Forms</title>
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
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -4px rgba(0, 0, 0, 0.03);
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
            font-size: 1.2rem;
            letter-spacing: -0.02em;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--primary), #1d4ed8);
            color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
        }

        .nav-back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 8px;
            background-color: var(--primary-light);
            border: 1px solid var(--primary-border);
            transition: all 0.2s ease;
        }

        .nav-back-link:hover {
            background-color: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
        }

        /* Main Form Container */
        .main-container {
            max-width: 680px;
            margin: 2.5rem auto 4rem;
            padding: 0 1.25rem;
            width: 100%;
            flex: 1;
        }

        /* Centered Form Card */
        .form-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .card-header {
            padding: 2rem 2.25rem 1.75rem;
            border-bottom: 1px solid var(--border-color);
            background-color: #ffffff;
        }

        .card-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .exercise-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background-color: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
            border-radius: 9999px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .card-icon {
            width: 44px;
            height: 44px;
            background-color: var(--primary-light);
            color: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            border: 1px solid var(--primary-border);
        }

        .card-header h1 {
            font-size: 1.65rem;
            font-weight: 800;
            color: var(--text-heading);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .card-header p {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.55;
        }

        /* Card Body */
        .card-body {
            padding: 2rem 2.25rem;
        }

        .fields-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
            margin-bottom: 1.75rem;
        }

        .fields-grid.single-col {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-heading);
            margin-bottom: 0.5rem;
        }

        .form-group label .required {
            color: #ef4444;
            margin-left: 2px;
        }

        .form-control {
            width: 100%;
            height: 48px;
            padding: 0 14px;
            font-size: 0.975rem;
            color: var(--text-heading);
            background-color: #f8fafc;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .form-control:focus {
            border-color: var(--primary);
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
            border: 1px solid var(--primary);
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(37, 99, 235, 0.3);
        }

        .btn-secondary {
            background-color: #ffffff;
            color: var(--text-body);
            border: 1.5px solid var(--border-color);
        }

        .btn-secondary:hover {
            background-color: #f8fafc;
            border-color: #94a3b8;
            color: var(--text-heading);
        }

        /* Result and Error Alerts */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 1.25rem 1.5rem;
            border-radius: var(--radius-md);
            margin-top: 1.75rem;
            border: 1px solid;
        }

        .alert-success {
            background-color: #f0fdf4;
            border-color: #bbf7d0;
            color: #166534;
        }

        .alert-success .alert-icon {
            color: #16a34a;
            font-size: 1.35rem;
            margin-top: 2px;
        }

        .alert-success .alert-title {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #15803d;
            margin-bottom: 4px;
        }

        .alert-success .alert-result {
            font-size: 1.65rem;
            font-weight: 800;
            color: #14532d;
            line-height: 1.2;
            word-break: break-all;
        }

        .alert-error {
            background-color: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .alert-error .alert-icon {
            color: #dc2626;
            font-size: 1.35rem;
            margin-top: 2px;
        }

        .alert-error .alert-title {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #b91c1c;
            margin-bottom: 4px;
        }

        .alert-error .alert-text {
            font-size: 0.95rem;
            font-weight: 500;
            color: #7f1d1d;
        }

        /* Footer */
        footer {
            background-color: #ffffff;
            border-top: 1px solid var(--border-color);
            padding: 1.5rem;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--text-muted);
            font-size: 0.875rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        @media (max-width: 640px) {
            .fields-grid {
                grid-template-columns: 1fr;
            }
            .card-header {
                padding: 1.5rem 1.25rem;
            }
            .card-body {
                padding: 1.5rem 1.25rem;
            }
            .form-actions {
                flex-direction: column;
            }
            .btn {
                width: 100%;
            }
            .footer-container {
                flex-direction: column;
                text-align: center;
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
            <a href="index.php" class="nav-back-link">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back to Dashboard</span>
            </a>
        </div>
    </header>

    <!-- Main Container -->
    <main class="main-container">
        <section class="form-card">
            <!-- Card Header -->
            <div class="card-header">
                <div class="card-meta">
                    <span class="exercise-badge">
                        <i class="fa-solid fa-code-branch"></i> Exercise 06
                    </span>
                    <div class="card-icon">
                        <i class="fa-solid fa-cube"></i>
                    </div>
                </div>
                <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
                <p><?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?></p>
            </div>

            <!-- Card Body / Form -->
            <div class="card-body">
                <form method="get" action="">
                    <input type="hidden" name="calculate" value="1">
                    <div class="fields-grid single-col">
                        <?php foreach ($fields as $key => $field): ?>
                            <div class="form-group">
                                <label for="<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($field[0], ENT_QUOTES, 'UTF-8') ?>
                                    <span class="required">*</span>
                                </label>
                                <input
                                    id="<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?>"
                                    class="form-control"
                                    type="number"
                                    name="<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?>"
                                    step="any"
                                    required
                                    inputmode="decimal"
                                    placeholder="e.g. <?= htmlspecialchars($field[1], ENT_QUOTES, 'UTF-8') ?>"
                                    value="<?= htmlspecialchars($inputValues[$key] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                >
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-calculator"></i> Calculate Result
                        </button>
                        <a href="index.php" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
                        </a>
                    </div>
                </form>

                <!-- Feedback Display -->
                <?php if ($error !== ''): ?>
                    <div class="alert alert-error" role="alert">
                        <div class="alert-icon">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                        <div class="alert-content">
                            <div class="alert-title">Calculation Error</div>
                            <div class="alert-text"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
                        </div>
                    </div>
                <?php elseif ($result !== null): ?>
                    <div class="alert alert-success" role="status">
                        <div class="alert-icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="alert-content">
                            <div class="alert-title">Calculation Result</div>
                            <div class="alert-result"><?= htmlspecialchars((string)$result, ENT_QUOTES, 'UTF-8') ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- Simple Footer -->
    <footer>
        <div class="footer-container">
            <span>PHP Functions &amp; Forms &bull; Exercise 06 of 10</span>
            <span>Built with HTML, CSS &amp; PHP</span>
        </div>
    </footer>

</body>
</html>