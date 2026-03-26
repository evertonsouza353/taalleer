<?php
session_start();

// Voor demo: als er nog geen sessie is, maak default waarden
if (!isset($_SESSION["user_name"])) {
    $_SESSION["user_name"] = "Gast";
}
if (!isset($_SESSION["user_xp"])) {
    $_SESSION["user_xp"] = 50; // voorbeeld XP
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Pocket Lingo Menu</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #1e1e1e;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .menu-item {
            padding: 12px 0;
            border-bottom: 1px solid #333;
            cursor: pointer;
        }

        .menu-item:hover {
            color: #4da3ff;
        }

        /* Main content */
        .content {
            flex: 1;
            padding: 30px;
        }

        .user-info {
            margin-bottom: 10px;
            color: #333;
        }

        .xp-bar {
            width: 300px;
            background: #ccc;
            border-radius: 10px;
            height: 20px;
            margin-bottom: 30px;
        }

        .xp-fill {
            background: #4da3ff;
            height: 100%;
            border-radius: 10px;
            width: 0;
            transition: width 0.5s ease-in-out;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .category {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: 0.2s;
        }

        .category:hover {
            transform: translateY(-5px);
        }

        .circle {
            width: 80px;
            height: 80px;
            background: #4da3ff;
            border-radius: 50%;
            margin: 0 auto 15px;
        }

        .category span {
            display: block;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>MENU</h2>
        <div class="menu-item">🏠 Home</div>
        <div class="menu-item">📚 Oefenen</div>
        <div class="menu-item">⚙️ Instellingen</div>
    </div>

    <!-- Main -->
    <div class="content">
        <!-- 🌟 Gebruiker info + XP -->
        <div class="user-info">
            Welkom, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!<br>
            XP: <?php echo $_SESSION["user_xp"]; ?>
        </div>
        <div class="xp-bar">
            <div class="xp-fill" style="width: <?php echo $_SESSION["user_xp"]; ?>px;"></div>
        </div>

        <h1>Kies een onderwerp</h1>

        <div class="grid" id="grid">
            <!-- JS vult dit -->
        </div>
    </div>

<script>
const onderwerpen = [
    "Dieren 🐶",
    "Kleding 👕",
    "Weer ☀️",
];

// Shuffle functie
function shuffle(array) {
    return array.sort(() => Math.random() - 0.5);
}

// Pak 3 random onderwerpen
const random = shuffle(onderwerpen).slice(0, 3);

const grid = document.getElementById("grid");

random.forEach(item => {
    const div = document.createElement("div");
    div.classList.add("category");

    div.innerHTML = `
        <div class="circle"></div>
        <span>${item}</span>
    `;

    // 🔥 Klik om thema te openen
    div.onclick = () => {
        const thema = item.split(" ")[0].toLowerCase();
        window.location.href = `level1.html?thema=${thema}`;
    };

    grid.appendChild(div);
});

// 🌟 Animatie voor XP-balk
const xpFill = document.querySelector(".xp-fill");
setTimeout(() => {
    xpFill.style.width = "<?php echo $_SESSION['user_xp']; ?>px";
}, 100);
</script>

</body>
</html>