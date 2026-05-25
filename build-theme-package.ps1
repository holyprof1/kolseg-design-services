param(
    [string]$Source = "wp-theme/kolseg-design-services",
    [string]$DeployTarget = "cpanel-theme/kolseg-design-services",
    [string]$ZipPath = "wp-theme/kolseg-design-services.zip"
)

$repoRoot = Get-Location
$sourcePath = Join-Path $repoRoot $Source
$deployPath = Join-Path $repoRoot $DeployTarget
$zipFullPath = Join-Path $repoRoot $ZipPath

if (-not (Test-Path $sourcePath)) {
    throw "Source theme folder not found: $sourcePath"
}

$requiredItems = @(
    "style.css",
    "functions.php",
    "header.php",
    "footer.php",
    "assets",
    "inc"
)

foreach ($item in $requiredItems) {
    $requiredPath = Join-Path $sourcePath $item
    if (-not (Test-Path $requiredPath)) {
        throw "Required theme item missing: $requiredPath"
    }
}

if (Test-Path $deployPath) {
    Remove-Item $deployPath -Recurse -Force
}

Copy-Item $sourcePath $deployPath -Recurse

if (Test-Path $zipFullPath) {
    Remove-Item $zipFullPath -Force
}

Compress-Archive -Path $sourcePath -DestinationPath $zipFullPath -CompressionLevel Optimal

Write-Host "Source theme:" $sourcePath
Write-Host "Deploy mirror:" $deployPath
Write-Host "Installable zip:" $zipFullPath
