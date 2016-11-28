@echo off
echo Copy v25...
for /D %%a in (25.*) do copy update-x86.xml %%a\WINNT_x86-msvc\update.xml >nul:
for /D %%a in (25.*) do copy update-x64.xml %%a\WINNT_x86_64-msvc\update.xml >nul:

echo Copy v26...
for /D %%a in (26.*) do copy update-x86.xml %%a\WINNT_x86-msvc\update.xml >nul:
for /D %%a in (26.*) do copy update-x64.xml %%a\WINNT_x86_64-msvc\update.xml >nul:

echo 26.5.0 transition...
copy update-x86.xml 26.5.0\Atom\update.xml >nul:

echo Copy v27...
for /D %%a in (27.*) do copy update-x86.xml %%a\WINNT_x86-msvc\update.xml >nul:
for /D %%a in (27.*) do copy update-x64.xml %%a\WINNT_x86_64-msvc\update.xml >nul:

echo Done!
