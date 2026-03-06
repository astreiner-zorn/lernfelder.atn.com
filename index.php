<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Übersicht meiner Lernfelder</title>

    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-xl p-10 text-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php require_once("lernfelder.php"); ?>
                <?php foreach ($lernfelder as $lernfeld): ?>
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl shadow-lg">
                        <a href="<?= $lernfeld["URL"]; ?>">
                            <img class="rounded-3xl" src="placeholder.jpg" alt="" />
                            <h5 class="mt-6 mb-2 text-2xl font-semibold text-gray-900">
                                <?= $lernfeld["Lernfeld"]; ?>
                            </h5>
                        </a>
                        <p class="mb-6 text-gray-600"><?= $lernfeld["Beschreibung"]; ?></p>
                        <a href="<?= $lernfeld["URL"]; ?>"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg inline-block">
                            <?= $lernfeld["Lernfeld"]; ?> anschauen
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>