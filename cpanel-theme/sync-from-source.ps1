param(
    [string]$Source = "wp-theme/kolseg-design-services",
    [string]$Target = "cpanel-theme/kolseg-design-services"
)

$repoRoot = Get-Location
$buildScript = Join-Path $repoRoot "build-theme-package.ps1"

if (-not (Test-Path $buildScript)) {
    throw "Build script not found: $buildScript"
}

powershell -ExecutionPolicy Bypass -File $buildScript -Source $Source -DeployTarget $Target
