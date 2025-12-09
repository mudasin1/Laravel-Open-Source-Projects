<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel OSS Catalog API</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet" type="text/css">
    <style>
        :root {
            --bg: #0d1117;
            --panel: #161b22;
            --accent: #2ea043;
            --muted: #a1a1aa;
            --text: #f3f4f6;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Source Sans Pro', sans-serif;
            background: radial-gradient(circle at 10% 20%, rgba(46,160,67,0.08), transparent 30%), var(--bg);
            color: var(--text);
            min-height: 100vh;
        }
        .wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 48px 24px 64px;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .badge {
            background: rgba(46,160,67,0.15);
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            letter-spacing: .05em;
            text-transform: uppercase;
            color: var(--accent);
            border: 1px solid rgba(46,160,67,0.35);
        }
        h1 {
            margin: 8px 0 4px;
            font-weight: 600;
            letter-spacing: -0.02em;
        }
        p {
            margin: 0 0 12px;
            color: var(--muted);
            line-height: 1.5;
        }
        section {
            background: var(--panel);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 12px;
            padding: 20px 20px 14px;
            margin-top: 18px;
        }
        code {
            background: rgba(255,255,255,0.06);
            padding: 3px 6px;
            border-radius: 6px;
        }
        pre {
            background: #0a0e14;
            padding: 16px;
            border-radius: 10px;
            overflow-x: auto;
            font-size: 13px;
            line-height: 1.45;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 12px;
        }
        .pill {
            display: inline-block;
            padding: 6px 10px;
            margin: 0 6px 6px 0;
            border-radius: 999px;
            background: rgba(255,255,255,0.06);
            color: var(--text);
            font-size: 13px;
        }
    </style>
</head>
<body>
<div class="wrap">
    <header>
        <div>
            <div class="badge">API ready</div>
            <h1>Laravel Open Source Catalog</h1>
            <p>Structured like a small enterprise service: repository + service layers, validation, caching, and RESTful endpoints.</p>
        </div>
        <div class="badge">Laravel {{ app()->version() }}</div>
    </header>

    <section>
        <h3>Key endpoints</h3>
        <div class="grid">
            <div>
                <p><code>GET /api/v1/projects</code></p>
                <p>List projects with filters for <code>catalog_letter</code>, <code>project_type</code>, <code>featured</code>, and <code>search</code>.</p>
            </div>
            <div>
                <p><code>POST /api/v1/projects</code></p>
                <p>Create a project via validated request payloads; stored with repository and service layers.</p>
            </div>
            <div>
                <p><code>GET /api/v1/projects/{slug}</code></p>
                <p>Retrieve a single project by slug using route model binding.</p>
            </div>
            <div>
                <p><code>PUT /api/v1/projects/{slug}</code> & <code>DELETE</code></p>
                <p>Update or delete records with cache invalidation handled in the service.</p>
            </div>
        </div>
    </section>

    <section>
        <h3>Try it quickly</h3>
        <p>Use <code>php artisan serve</code> then call the API. Example request against the seeded catalog:</p>
        <pre>curl -s http://localhost:8000/api/v1/projects?catalog_letter=L | jq '.data[0]'</pre>
        <p class="pill">Caching</p>
        <p class="pill">Validation</p>
        <p class="pill">Repository pattern</p>
        <p class="pill">Service layer</p>
        <p class="pill">Seeded catalog</p>
    </section>
</div>
</body>
</html>
