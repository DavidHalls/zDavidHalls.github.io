#!/bin/bash
psql="psql --username=freecodecamp --dbname=periodic_table --tuples-only -c "

MAIN(){
  if [[ ! $1 ]]
  then
    echo "Please provide an element as an argument."
  else
    if [[ $1 = [0-9] ]]
    then
      ELEMENTS=$($psql "SELECT * FROM ELEMENTS where atomic_number = $1")
    else
      ELEMENTS=$($psql "SELECT * FROM ELEMENTS where symbol = '$1' or name = '$1'")
    fi
    
    if [[ -z $ELEMENTS ]]
    then
      echo -e "I could not find that element in the database."
    else
      echo "$ELEMENTS" | while read ATOMIC_NUMBER BAR SYMBOL BAR NAME
    do
      PROPS=$($psql "SELECT * FROM PROPERTIES p right join types t on p.type_id = t.type_id WHERE atomic_number = $ATOMIC_NUMBER")
      # echo "$PROPS"
      echo "$PROPS" | while read ATOMIC_NUMBER BAR ATOMIC_MASS BAR MELTING_POINT BAR BOILING_POINT BAR TYPE_ID BAR TYPE_ID2 BAR TYPE
      do
        echo -e "The element with atomic number $ATOMIC_NUMBER is $NAME ($SYMBOL). It's a $TYPE, with a mass of $ATOMIC_MASS amu. $NAME has a melting point of $MELTING_POINT celsius and a boiling point of $BOILING_POINT celsius."
      done      
    done
    fi
  fi
}

MAIN $1