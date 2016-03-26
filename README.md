# Challenge 045: Flippy Sort

## Usage

    app/console app:sort
    
    Usage:
      app:sort [options] [--] <string>
    
    Arguments:
      string                       String to sort
    
    Options:
      -r, --with-results           Display results
      -p, --with-profiling         Record profiling results
      -a, --algorithm[=ALGORITHM]  Sort algorithm(s) to use [default: ["flippy"]] (multiple values allowed)
      -h, --help                   Display this help message
      -q, --quiet                  Do not output any message
      -V, --version                Display this application version
          --ansi                   Force ANSI output
          --no-ansi                Disable ANSI output
      -n, --no-interaction         Do not ask any interactive question
      -v|vv|vvv, --verbose         Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
    
    Help:
     Group/Sort alnum input string by character
     
## Supported Algorithms

### Ours

* flippy      (default flippy challenge sort)
* flippy-preg (attempted sort via regular expressions)
* group-count (custom grouping algorithm thrown in for fun)

### Native

* native      (native php sort)

### Third Party

_note: pulled from third party with no modifications so some of them break on certain input or do not work at all_

* bubble
* cocktail
* comb
* counting
* gnome
* heap 
* insert 
* merge
* odd-even 
* quick 
* selection 
* shell

## Installation

1. `composer install`

## Tests

1. Run `bin/phpunit`
