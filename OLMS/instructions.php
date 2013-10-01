<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';

?>

<pre>Note for C :::
1. Its a gcc compiler please take care of it{please come out of Turbo C}
2. Don't try to include "conio.h" and "dos.h"
3. Don't write void main().....only main() or int main() will work
4. The executable generated will work only in Linux{any distro}
5. Don't write getch()
6. Don't write scanf() {As there is no terminal to take input}
7. Upload only .c or .C extension for the C source code

Notes for C++ :::
1. Its a g++ compiler 
2. Don't try to write "#include <?php echo "<" ;
echo " iostream.h ";
echo ">";?> instead write these two lines:::
#include<?php echo "<" ;
echo " iostream";
echo ">" 
?>

using namespace std;
3. Don't write void main ... 
only int main() will work and then u have to write "return 0 ; " in main's body
4. Don't write cin>>
5. Upload only .cpp or .CPP extension for the C source code

Notes for Java :::
1. Make sure you have the same class name as suggested
2. Don't try to run awt or swing's program
3. Upload only .java files

Notes for Syntax highlighting :::
1. You can highlight any source code of any language that are being provided in menu{choose a language }
2. Highlighting with compilation is only available for c and c++ 

<strong> Note this online compiler is not  a subtitute for your compilers...
Its just a helper application to help track your programs and help you in case of your compiler not working ....</strong>
</pre>
<?php
require 'footer.php';
?>
</body>
</html>
