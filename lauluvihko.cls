\NeedsTeXFormat{LaTeX2e}
\ProvidesClass{lauluvihko}[2014/12/05 Lauluvihko-pohja]

\LoadClassWithOptions{article}

\RequirePackage{titlesec} %kivemmat otsikot 
\RequirePackage{ifthen} %ehtoja varten
\RequirePackage{palatino} %joku söpömpi fontti

\addtolength{\oddsidemargin}{-0.5in}
\addtolength{\evensidemargin}{-0.5in}
\addtolength{\topmargin}{-0.5in}
\addtolength{\textwidth}{1.0in}
\addtolength{\textheight}{0.5in}

\setlength{\parindent}{0mm} 
\setlength{\parskip}{1mm}

\long\def\@tapahtuma{\relax}
\newcommand{\tapahtuma}[1]{\gdef\@tapahtuma{#1}}

\long\def\@pvm{\relax}
\newcommand{\pvm}[1]{\gdef\@pvm{#1}}

\long\def\@kansikuva{\relax}
\newcommand{\kansikuva}[1]{\gdef\@kansikuva{#1}}

\long\def\@takakansikuva{\relax}
\newcommand{\takakansikuva}[1]{\gdef\@takakansikuva{#1}}

\titleformat{\section}         % Customise the \section command 
  {\Large\scshape\raggedright} % Make the \section headers large (\Large),
                               % small capitals (\scshape) and left aligned (\raggedright)
  { \arabic{section}: }{0em} % Can be used to give a prefix to all sections, l<ike 'Section ...'
  {}                           % Can be used to insert code before the heading
  []                 % Inserts a horizontal line after the heading

% \centeredline tuottaa palstan levyisen viivan
\newcommand{\centeredline}{\rule{\columnwidth}{1px}}
% \laulu{laulu}{sävel} tuottaa laululle otsikon ja sävelen
% jos sävel ei ole tiedossa, käytä \section normaalisti
\newcommand{\laulu}[2]{ \section{#1}  S\"avel: \emph{#2} \\ \centeredline \bigskip \\}

% \kansilehti luo kansilehden, jossa on kansikuva, tapahtuman nimi ja päivämäärä, jos ne on annettu
\newcommand{\kansilehti}{
      \thispagestyle{empty}
      \begin{center}
      \null
      \ifthenelse{\equal{\@tapahtuma}{\relax}}{}{\vfill{\fontsize{1.5cm}{1em}\selectfont \@tapahtuma} \\ } % tapahtuman nimi
      \ifthenelse{\equal{\@kansikuva}{\relax}}{}{\vfill\includegraphics[width=\textwidth,height=\textheight,keepaspectratio]{\@kansikuva} \\} % kansikuva
      \ifthenelse{\equal{\@pvm}{\relax}}{}{\vfill\Huge\@pvm \\}  % tapahtuman päivämärää
      \vfill 
      \null
      \newpage
      \end{center}
      }

\newcommand{\takakansi}{
      \thispagestyle{empty}
      \ifthenelse{\equal{\@takakansikuva}{\relax}}{}
         {  
            \begin{center} \null\vfill
            \includegraphics[width=\textwidth,height=\textheight,keepaspectratio]{\@takakansikuva}
            \vfill\null
            \end{center}
         }
      }
