<?php
require_once __DIR__ . '/vendor/autoload.php';
use OpenCensus\Trace\Exporter\NullExporter;
# [START trace_setup_php_use_statement]
use OpenCensus\Trace\Exporter\StackdriverExporter;
use OpenCensus\Trace\Tracer;
# [END trace_setup_php_use_statement]
$projectId = 'electric-nomad-230010';
if ($projectId === false) {
	die('Set GOOGLE_PROJECT_ID envvar');
}
# [START trace_setup_php_exporter_setup]
$exporter = new StackdriverExporter([
	'clientConfig' => [
		'projectId' => $projectId
	]
]);
# [END trace_setup_php_exporter_setup]
// When running tests, use a null exporter instead.
if (getenv('USE_NULL_EXPORTER')) {
	$exporter = new NullExporter();
}
echo "shuashua";
# [START trace_setup_php_tracer_start]
Tracer::start($exporter);
# [END trace_setup_php_tracer_start]

$string = "test"
echo $string