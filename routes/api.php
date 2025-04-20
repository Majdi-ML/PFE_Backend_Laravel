<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LdapAuthController;
use App\Http\Controllers\OSController;
use App\Http\Controllers\PlatformeController;
use App\Http\Controllers\SoclestandardomuController;
use App\Http\Controllers\TypeserveurController;
use  App\Http\Controllers\CriticiteController;
use  App\Http\Controllers\EtatController;
use  App\Http\Controllers\MonitoredbyController;
use  App\Http\Controllers\VersionsnmpController;
use  App\Http\Controllers\StatusController;
use  App\Http\Controllers\RoleController;
use  App\Http\Controllers\SupportController;
use  App\Http\Controllers\ServiceplatfomController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\VerTechFirmwareController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\LogfileController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\ProcessController;




Route::post('/ldap-login', [LdapAuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/ldap-logout', [LdapAuthController::class, 'logout']);
Route::apiResource('criticites',CriticiteController::class);
Route::apiResource('os', OSController::class);
Route::apiResource('platformes', PlatformeController::class);
Route::apiResource('soclestandardomu', SoclestandardomuController::class);
Route::apiResource('typeserveurs', TypeserveurController::class);
Route::apiResource('etat', EtatController::class);
Route::apiResource('monitoredby', MonitoredbyController::class);
Route::apiResource('versionsnmp', VersionsnmpController::class);
Route::apiResource('status', StatusController::class);
Route::apiResource('vertechfirmwares', VerTechFirmwareController::class);
Route::apiResource('role', RoleController::class);
Route::apiResource('support', SupportController::class);
Route::apiResource('serviceplatfoms', ServiceplatfomController::class);

Route::apiResource('demandes', DemandeController::class);
Route::apiResource('serveurs', ServeurController::class);
Route::apiResource('clusters', ClusterController::class);
Route::apiResource('logfiles', LogfileController::class);
Route::apiResource('scripts', ScriptController::class);
Route::apiResource('processes', ProcessController::class);
