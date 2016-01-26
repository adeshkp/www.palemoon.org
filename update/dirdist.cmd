@echo off
echo Copy Old versions...
copy update-x86.xml 3.6.32\update.xml >nul:
copy update-x86.xml 4.0\update.xml >nul:
copy update-x86.xml 4.0.5\update.xml >nul:
copy update-x86.xml 4.0.7\update.xml >nul:
copy update-x86.xml 5.0\update.xml >nul:
copy update-x86.xml 6.0\update.xml >nul:
copy update-x86.xml 6.0.2\update.xml >nul:
copy update-x86.xml 7.0\update.xml >nul:
copy update-x86.xml 7.0.1\update.xml >nul:
copy update-x64.xml 7.0.1-x64\update.xml >nul:
copy update-x86.xml 8.0\update.xml >nul:
copy update-x64.xml 8.0-x64\update.xml >nul:
copy update-x86.xml 9.0.1\update.xml >nul:
copy update-x64.xml 9.0.1-x64\update.xml >nul:
copy update-x86.xml 9.1\update.xml >nul:
copy update-x64.xml 9.1-x64\update.xml >nul:
copy update-x86.xml 9.2\update.xml >nul:
copy update-x64.xml 9.2-x64\update.xml >nul:
copy update-x86.xml 11.0\update.xml >nul:
copy update-x64.xml 11.0-x64\update.xml >nul:
copy update-x86.xml 11.0.1\update.xml >nul:
copy update-x64.xml 11.0.1-x64\update.xml >nul:
copy update-x86.xml 12.0\update.xml >nul:
copy update-x64.xml 12.0-x64\update.xml >nul:
copy update-x86.xml 12.1\update.xml >nul:
copy update-x64.xml 12.1-x64\update.xml >nul:
copy update-x86.xml 12.2\update.xml >nul:
copy update-x64.xml 12.2-x64\update.xml >nul:
copy update-x86.xml 12.2.1\update.xml >nul:
copy update-x64.xml 12.2.1-x64\update.xml >nul:
copy update-x86.xml 12.3\update.xml >nul:
copy update-x64.xml 12.3-x64\update.xml >nul:
copy update-x86.xml 12.3r2\update.xml >nul:
copy update-x86.xml 15.0\update.xml >nul:
copy update-x64.xml 15.0-x64\update.xml >nul:
copy update-x86.xml 15.1\update.xml >nul:
copy update-x64.xml 15.1-x64\update.xml >nul:
copy update-x86.xml 15.1.1\update.xml >nul:
copy update-x64.xml 15.1.1-x64\update.xml >nul:
copy update-x86.xml 15.2\update.xml >nul:
copy update-x64.xml 15.2-x64\update.xml >nul:
copy update-x86.xml 15.2.1\update.xml >nul:
copy update-x64.xml 15.2.1-x64\update.xml >nul:
copy update-x86.xml 15.3\update.xml >nul:
copy update-x64.xml 15.3-x64\update.xml >nul:
copy update-x86.xml 15.3.1\update.xml >nul:
copy update-x64.xml 15.3.1-x64\update.xml >nul:
copy update-x86.xml 15.3.2\update.xml >nul:
copy update-x64.xml 15.3.2-x64\update.xml >nul:
copy update-x86.xml 15.4\update.xml >nul:
copy update-x64.xml 15.4-x64\update.xml >nul:
copy update-x86.xml 15.4.1\update.xml >nul:
copy update-x64.xml 15.4.1-x64\update.xml >nul:
copy update-x86.xml 19.0\update.xml >nul:
copy update-x64.xml 19.0-x64\update.xml >nul:
copy update-x86.xml 19.0.1\update.xml >nul:
copy update-x64.xml 19.0.1-x64\update.xml >nul:
copy update-x86.xml 19.0.2\update.xml >nul:
copy update-x64.xml 19.0.2-x64\update.xml >nul:
copy update-x86.xml 20.0.1\update.xml >nul:
copy update-x64.xml 20.0.1-x64\update.xml >nul:
copy update-x86.xml 20.1\update.xml >nul:
copy update-x64.xml 20.1-x64\update.xml >nul:
copy update-x86.xml 20.2\update.xml >nul:
copy update-x64.xml 20.2-x64\update.xml >nul:
copy update-x86.xml 20.2.1\update.xml >nul:
copy update-x64.xml 20.2.1-x64\update.xml >nul:
copy update-x86.xml 20.3\update.xml >nul:
copy update-x64.xml 20.3-x64\update.xml >nul:
copy update-x86.xml 20.3b3\update.xml >nul:
copy update-x64.xml 20.3b3-x64\update.xml >nul:

echo Copy v24...
for /D %%a in (24.*) do copy update-x86.xml %%a\WINNT_x86-msvc\update.xml >nul:
for /D %%a in (24.*) do copy update-x64.xml %%a\WINNT_x86_64-msvc\update.xml >nul:

echo Copy v25...
for /D %%a in (25.*) do copy update-x86.xml %%a\WINNT_x86-msvc\update.xml >nul:
for /D %%a in (25.*) do copy update-x64.xml %%a\WINNT_x86_64-msvc\update.xml >nul:
for /D %%a in (25.*) do copy update-atom.xml %%a\Atom\update.xml >nul:

echo Copy v26...
for /D %%a in (26.*) do copy update-x86.xml %%a\WINNT_x86-msvc\update.xml >nul:
for /D %%a in (26.*) do copy update-x64.xml %%a\WINNT_x86_64-msvc\update.xml >nul:
for /D %%a in (26.*) do copy update-atom.xml %%a\Atom\update.xml >nul:

echo Done!
