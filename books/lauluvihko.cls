\NeedsTeXFormat{LaTeX2e}
\ProvidesClass{lauluvihko}[2014/12/05 Lauluvihko-pohja]

\LoadClassWithOptions{article}

\RequirePackage{titlesec} %kivemmat otsikot 
\RequirePackage{ifthen} %ehtoja varten
\RequirePackage{palatino} %joku sÃ¶pÃ¶mpi fontti

\addtolength{\oddsidemargin}{-0.5in}
\addtolength{\evensidemargin}{-0.5in}
\addtolength{\topmargin}{-0.5in}
\addtolength{\textwidth}{1.0in}
\addtolength{\textheight}{0.5in}

\setlength{\parindent}{0mm} 
\setlength{\parskip}{1mm}

\titleformat{\section}         % Customise the \section command 
  {\Large\scshape\raggedright} % Make the \section headers large (\Large),
                               % small capitals (\scshape) and left aligned (\raggedright)
  {Laulu \arabic{section}: }{0em} % Can be used to give a prefix to all sections, l<ike 'Section ...'
  {}                           % Can be used to insert code before the heading
  []                 % Inserts a horizontal line after the heading
\newcommand{\centeredline}{\rule{\columnwidth}{1px}}
\newcommand{\laulu}[2]{ \section{#1}  S\"avel: \emph{#2} \\ \centeredline \\}
