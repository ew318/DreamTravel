$holiday = new App\Holiday;
$holiday->title = 'Kayak in Greece';
$holiday->description = 'Learn to sea kayak around the spectacular Greek coastline of Ithaca.';
$holiday->location = 'Ithaca';
$holiday->duration = 5;
$holiday->save();

$holiday = new App\Holiday;
$holiday->title = 'Hike in Slovenia';
$holiday->description = 'Join our guides for a thrilling hike through the Slovenian countryside.';
$holiday->location = 'Slovenia';
$holiday->duration = 4;
$holiday->save();