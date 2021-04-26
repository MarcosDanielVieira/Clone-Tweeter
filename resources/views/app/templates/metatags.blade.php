<!-- MetaTags da página -->
<meta charset="UTF-8" />
<meta name="description"            content="{{ isset ( $desc_pagina ) ? $desc_pagina : ""  }}" />
<meta name="keywords"               content="{{ isset ( $keywords_pagina ) ? $keywords_pagina : "" }}" />
<meta name="author"                 content="{{ isset ( $autor_pagina ) ? $autor_pagina : "" }}" />
<meta name="robots"                 content="{{ isset ( $robots ) ? $robots : "" }}" />
<meta name="csrf-token"             content="{{ csrf_token() }}">
<meta name="baseurl"                content={{ url('') }} />
<meta http-equiv="X-UA-Compatible"  content="IE=edge" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">