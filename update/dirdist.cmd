@echo off
echo Copy v25...
for /D %%a in (25.*) do copy update-x86.xml %%a\WINNT_x86-msvc\update.xml >nul:
for /D %%a in (25.*) do copy update-x64.xml %%a\WINNT_x86_64-msvc\update.xml >nul:
for /D %%a in (25.*) do copy update-atom.xml %%a\Atom\update.xml >nul:

echo Copy v26...
for /D %%a in (26.*) do copy update-x86.xml %%a\WINNT_x86-msvc\update.xml >nul:
for /D %%a in (26.*) do copy update-x64.xml %%a\WINNT_x86_64-msvc\update.xml >nul:
for /D %%a in (26.*) do copy update-atom.xml %%a\Atom\update.xml >nul:

echo Done!
