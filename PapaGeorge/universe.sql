--
-- PostgreSQL database dump
--

-- Dumped from database version 12.17 (Ubuntu 12.17-1.pgdg22.04+1)
-- Dumped by pg_dump version 12.17 (Ubuntu 12.17-1.pgdg22.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE universe;
--
-- Name: universe; Type: DATABASE; Schema: -; Owner: freecodecamp
--

CREATE DATABASE universe WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'C.UTF-8' LC_CTYPE = 'C.UTF-8';


ALTER DATABASE universe OWNER TO freecodecamp;

\connect universe

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: description; Type: TABLE; Schema: public; Owner: freecodecamp
--

CREATE TABLE public.description (
    description_id integer NOT NULL,
    name character varying(100) NOT NULL,
    description text,
    planet_types text
);


ALTER TABLE public.description OWNER TO freecodecamp;

--
-- Name: description_description_id_seq; Type: SEQUENCE; Schema: public; Owner: freecodecamp
--

CREATE SEQUENCE public.description_description_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.description_description_id_seq OWNER TO freecodecamp;

--
-- Name: description_description_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: freecodecamp
--

ALTER SEQUENCE public.description_description_id_seq OWNED BY public.description.description_id;


--
-- Name: galaxy; Type: TABLE; Schema: public; Owner: freecodecamp
--

CREATE TABLE public.galaxy (
    galaxy_id integer NOT NULL,
    name character varying(100) NOT NULL,
    has_life boolean,
    is_spherical boolean,
    size integer,
    distance_from_earth numeric,
    type text
);


ALTER TABLE public.galaxy OWNER TO freecodecamp;

--
-- Name: galaxy_galaxy_id_seq; Type: SEQUENCE; Schema: public; Owner: freecodecamp
--

CREATE SEQUENCE public.galaxy_galaxy_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galaxy_galaxy_id_seq OWNER TO freecodecamp;

--
-- Name: galaxy_galaxy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: freecodecamp
--

ALTER SEQUENCE public.galaxy_galaxy_id_seq OWNED BY public.galaxy.galaxy_id;


--
-- Name: moon; Type: TABLE; Schema: public; Owner: freecodecamp
--

CREATE TABLE public.moon (
    moon_id integer NOT NULL,
    name character varying(100) NOT NULL,
    has_life boolean,
    is_spherical boolean,
    size integer,
    distance_from_earth numeric,
    type text,
    planet_id integer
);


ALTER TABLE public.moon OWNER TO freecodecamp;

--
-- Name: moon_moon_id_seq; Type: SEQUENCE; Schema: public; Owner: freecodecamp
--

CREATE SEQUENCE public.moon_moon_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.moon_moon_id_seq OWNER TO freecodecamp;

--
-- Name: moon_moon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: freecodecamp
--

ALTER SEQUENCE public.moon_moon_id_seq OWNED BY public.moon.moon_id;


--
-- Name: planet; Type: TABLE; Schema: public; Owner: freecodecamp
--

CREATE TABLE public.planet (
    planet_id integer NOT NULL,
    name character varying(100) NOT NULL,
    has_life boolean,
    is_spherical boolean,
    size integer,
    distance_from_earth numeric,
    type text,
    star_id integer
);


ALTER TABLE public.planet OWNER TO freecodecamp;

--
-- Name: planet_planet_id_seq; Type: SEQUENCE; Schema: public; Owner: freecodecamp
--

CREATE SEQUENCE public.planet_planet_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.planet_planet_id_seq OWNER TO freecodecamp;

--
-- Name: planet_planet_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: freecodecamp
--

ALTER SEQUENCE public.planet_planet_id_seq OWNED BY public.planet.planet_id;


--
-- Name: star; Type: TABLE; Schema: public; Owner: freecodecamp
--

CREATE TABLE public.star (
    star_id integer NOT NULL,
    name character varying(100) NOT NULL,
    has_life boolean,
    is_spherical boolean,
    size integer,
    distance_from_earth numeric,
    type text,
    galaxy_id integer
);


ALTER TABLE public.star OWNER TO freecodecamp;

--
-- Name: star_star_id_seq; Type: SEQUENCE; Schema: public; Owner: freecodecamp
--

CREATE SEQUENCE public.star_star_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.star_star_id_seq OWNER TO freecodecamp;

--
-- Name: star_star_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: freecodecamp
--

ALTER SEQUENCE public.star_star_id_seq OWNED BY public.star.star_id;


--
-- Name: description description_id; Type: DEFAULT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.description ALTER COLUMN description_id SET DEFAULT nextval('public.description_description_id_seq'::regclass);


--
-- Name: galaxy galaxy_id; Type: DEFAULT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.galaxy ALTER COLUMN galaxy_id SET DEFAULT nextval('public.galaxy_galaxy_id_seq'::regclass);


--
-- Name: moon moon_id; Type: DEFAULT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.moon ALTER COLUMN moon_id SET DEFAULT nextval('public.moon_moon_id_seq'::regclass);


--
-- Name: planet planet_id; Type: DEFAULT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.planet ALTER COLUMN planet_id SET DEFAULT nextval('public.planet_planet_id_seq'::regclass);


--
-- Name: star star_id; Type: DEFAULT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.star ALTER COLUMN star_id SET DEFAULT nextval('public.star_star_id_seq'::regclass);


--
-- Data for Name: description; Type: TABLE DATA; Schema: public; Owner: freecodecamp
--

INSERT INTO public.description VALUES (1, 'byzgig', 'large and blue', 'o');
INSERT INTO public.description VALUES (2, 'fizz', 'buzz', 'fizzbuzz');
INSERT INTO public.description VALUES (3, 'foo', 'bar', 'foobar');


--
-- Data for Name: galaxy; Type: TABLE DATA; Schema: public; Owner: freecodecamp
--

INSERT INTO public.galaxy VALUES (1, 'Noah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (2, 'Liam', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (3, 'Mason', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (4, 'Jacob', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (5, 'William', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (6, 'Ethan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (7, 'James', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (8, 'Alexander', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (9, 'Michael', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (10, 'Benjamin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (11, 'Elijah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (12, 'Daniel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (13, 'Aiden', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (14, 'Logan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (15, 'Matthew', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (16, 'Lucas', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (17, 'Jackson', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (18, 'David', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (19, 'Oliver', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (20, 'Jayden', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (21, 'Joseph', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (22, 'Gabriel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (23, 'Samuel', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (24, 'Carter', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (25, 'Anthony', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (26, 'John', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (27, 'Dylan', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (28, 'Luke', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (29, 'Henry', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (30, 'Andrew', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (31, 'Emma', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (32, 'Olivia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (33, 'Sophia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (34, 'Ava', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (35, 'Isabella', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (36, 'Mia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (37, 'Abigail', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (38, 'Emily', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (39, 'Charlotte', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (40, 'Harper', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (41, 'Madison', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (42, 'Amelia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (43, 'Elizabeth', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (44, 'Sofia', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (45, 'Evelyn', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (46, 'Avery', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (47, 'Chloe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (48, 'Ella', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (49, 'Grace', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (50, 'Victoria', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (51, 'Aubrey', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (52, 'Scarlett', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (53, 'Zoey', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (54, 'Addison', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (55, 'Lily', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (56, 'Lillian', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (57, 'Natalie', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (58, 'Hannah', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (59, 'Aria', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.galaxy VALUES (60, 'Layla', NULL, NULL, NULL, NULL, NULL);


--
-- Data for Name: moon; Type: TABLE DATA; Schema: public; Owner: freecodecamp
--

INSERT INTO public.moon VALUES (1, 'Noah', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO public.moon VALUES (2, 'Liam', NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO public.moon VALUES (3, 'Mason', NULL, NULL, NULL, NULL, NULL, 3);
INSERT INTO public.moon VALUES (4, 'Jacob', NULL, NULL, NULL, NULL, NULL, 4);
INSERT INTO public.moon VALUES (5, 'William', NULL, NULL, NULL, NULL, NULL, 5);
INSERT INTO public.moon VALUES (6, 'Ethan', NULL, NULL, NULL, NULL, NULL, 6);
INSERT INTO public.moon VALUES (7, 'James', NULL, NULL, NULL, NULL, NULL, 7);
INSERT INTO public.moon VALUES (8, 'Alexander', NULL, NULL, NULL, NULL, NULL, 8);
INSERT INTO public.moon VALUES (9, 'Michael', NULL, NULL, NULL, NULL, NULL, 9);
INSERT INTO public.moon VALUES (10, 'Benjamin', NULL, NULL, NULL, NULL, NULL, 10);
INSERT INTO public.moon VALUES (11, 'Elijah', NULL, NULL, NULL, NULL, NULL, 11);
INSERT INTO public.moon VALUES (12, 'Daniel', NULL, NULL, NULL, NULL, NULL, 12);
INSERT INTO public.moon VALUES (13, 'Aiden', NULL, NULL, NULL, NULL, NULL, 13);
INSERT INTO public.moon VALUES (14, 'Logan', NULL, NULL, NULL, NULL, NULL, 14);
INSERT INTO public.moon VALUES (15, 'Matthew', NULL, NULL, NULL, NULL, NULL, 15);
INSERT INTO public.moon VALUES (16, 'Lucas', NULL, NULL, NULL, NULL, NULL, 16);
INSERT INTO public.moon VALUES (17, 'Jackson', NULL, NULL, NULL, NULL, NULL, 17);
INSERT INTO public.moon VALUES (18, 'David', NULL, NULL, NULL, NULL, NULL, 18);
INSERT INTO public.moon VALUES (19, 'Oliver', NULL, NULL, NULL, NULL, NULL, 19);
INSERT INTO public.moon VALUES (20, 'Jayden', NULL, NULL, NULL, NULL, NULL, 20);
INSERT INTO public.moon VALUES (21, 'Joseph', NULL, NULL, NULL, NULL, NULL, 21);
INSERT INTO public.moon VALUES (22, 'Gabriel', NULL, NULL, NULL, NULL, NULL, 22);
INSERT INTO public.moon VALUES (23, 'Samuel', NULL, NULL, NULL, NULL, NULL, 23);
INSERT INTO public.moon VALUES (24, 'Carter', NULL, NULL, NULL, NULL, NULL, 24);
INSERT INTO public.moon VALUES (25, 'Anthony', NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO public.moon VALUES (26, 'John', NULL, NULL, NULL, NULL, NULL, 26);
INSERT INTO public.moon VALUES (27, 'Dylan', NULL, NULL, NULL, NULL, NULL, 27);
INSERT INTO public.moon VALUES (28, 'Luke', NULL, NULL, NULL, NULL, NULL, 28);
INSERT INTO public.moon VALUES (29, 'Henry', NULL, NULL, NULL, NULL, NULL, 29);
INSERT INTO public.moon VALUES (30, 'Andrew', NULL, NULL, NULL, NULL, NULL, 30);
INSERT INTO public.moon VALUES (31, 'Emma', NULL, NULL, NULL, NULL, NULL, 31);
INSERT INTO public.moon VALUES (32, 'Olivia', NULL, NULL, NULL, NULL, NULL, 32);
INSERT INTO public.moon VALUES (33, 'Sophia', NULL, NULL, NULL, NULL, NULL, 33);
INSERT INTO public.moon VALUES (34, 'Ava', NULL, NULL, NULL, NULL, NULL, 34);
INSERT INTO public.moon VALUES (35, 'Isabella', NULL, NULL, NULL, NULL, NULL, 35);
INSERT INTO public.moon VALUES (36, 'Mia', NULL, NULL, NULL, NULL, NULL, 36);
INSERT INTO public.moon VALUES (37, 'Abigail', NULL, NULL, NULL, NULL, NULL, 37);
INSERT INTO public.moon VALUES (38, 'Emily', NULL, NULL, NULL, NULL, NULL, 38);
INSERT INTO public.moon VALUES (39, 'Charlotte', NULL, NULL, NULL, NULL, NULL, 39);
INSERT INTO public.moon VALUES (40, 'Harper', NULL, NULL, NULL, NULL, NULL, 40);
INSERT INTO public.moon VALUES (41, 'Madison', NULL, NULL, NULL, NULL, NULL, 41);
INSERT INTO public.moon VALUES (42, 'Amelia', NULL, NULL, NULL, NULL, NULL, 42);
INSERT INTO public.moon VALUES (43, 'Elizabeth', NULL, NULL, NULL, NULL, NULL, 43);
INSERT INTO public.moon VALUES (44, 'Sofia', NULL, NULL, NULL, NULL, NULL, 44);
INSERT INTO public.moon VALUES (45, 'Evelyn', NULL, NULL, NULL, NULL, NULL, 45);
INSERT INTO public.moon VALUES (46, 'Avery', NULL, NULL, NULL, NULL, NULL, 46);
INSERT INTO public.moon VALUES (47, 'Chloe', NULL, NULL, NULL, NULL, NULL, 47);
INSERT INTO public.moon VALUES (48, 'Ella', NULL, NULL, NULL, NULL, NULL, 48);
INSERT INTO public.moon VALUES (49, 'Grace', NULL, NULL, NULL, NULL, NULL, 49);
INSERT INTO public.moon VALUES (50, 'Victoria', NULL, NULL, NULL, NULL, NULL, 50);
INSERT INTO public.moon VALUES (51, 'Aubrey', NULL, NULL, NULL, NULL, NULL, 51);
INSERT INTO public.moon VALUES (52, 'Scarlett', NULL, NULL, NULL, NULL, NULL, 52);
INSERT INTO public.moon VALUES (53, 'Zoey', NULL, NULL, NULL, NULL, NULL, 53);
INSERT INTO public.moon VALUES (54, 'Addison', NULL, NULL, NULL, NULL, NULL, 54);
INSERT INTO public.moon VALUES (55, 'Lily', NULL, NULL, NULL, NULL, NULL, 55);
INSERT INTO public.moon VALUES (56, 'Lillian', NULL, NULL, NULL, NULL, NULL, 56);
INSERT INTO public.moon VALUES (57, 'Natalie', NULL, NULL, NULL, NULL, NULL, 57);
INSERT INTO public.moon VALUES (58, 'Hannah', NULL, NULL, NULL, NULL, NULL, 58);
INSERT INTO public.moon VALUES (59, 'Aria', NULL, NULL, NULL, NULL, NULL, 59);
INSERT INTO public.moon VALUES (60, 'Layla', NULL, NULL, NULL, NULL, NULL, 60);


--
-- Data for Name: planet; Type: TABLE DATA; Schema: public; Owner: freecodecamp
--

INSERT INTO public.planet VALUES (1, 'Noah', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO public.planet VALUES (2, 'Liam', NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO public.planet VALUES (3, 'Mason', NULL, NULL, NULL, NULL, NULL, 3);
INSERT INTO public.planet VALUES (4, 'Jacob', NULL, NULL, NULL, NULL, NULL, 4);
INSERT INTO public.planet VALUES (5, 'William', NULL, NULL, NULL, NULL, NULL, 5);
INSERT INTO public.planet VALUES (6, 'Ethan', NULL, NULL, NULL, NULL, NULL, 6);
INSERT INTO public.planet VALUES (7, 'James', NULL, NULL, NULL, NULL, NULL, 7);
INSERT INTO public.planet VALUES (8, 'Alexander', NULL, NULL, NULL, NULL, NULL, 8);
INSERT INTO public.planet VALUES (9, 'Michael', NULL, NULL, NULL, NULL, NULL, 9);
INSERT INTO public.planet VALUES (10, 'Benjamin', NULL, NULL, NULL, NULL, NULL, 10);
INSERT INTO public.planet VALUES (11, 'Elijah', NULL, NULL, NULL, NULL, NULL, 11);
INSERT INTO public.planet VALUES (12, 'Daniel', NULL, NULL, NULL, NULL, NULL, 12);
INSERT INTO public.planet VALUES (13, 'Aiden', NULL, NULL, NULL, NULL, NULL, 13);
INSERT INTO public.planet VALUES (14, 'Logan', NULL, NULL, NULL, NULL, NULL, 14);
INSERT INTO public.planet VALUES (15, 'Matthew', NULL, NULL, NULL, NULL, NULL, 15);
INSERT INTO public.planet VALUES (16, 'Lucas', NULL, NULL, NULL, NULL, NULL, 16);
INSERT INTO public.planet VALUES (17, 'Jackson', NULL, NULL, NULL, NULL, NULL, 17);
INSERT INTO public.planet VALUES (18, 'David', NULL, NULL, NULL, NULL, NULL, 18);
INSERT INTO public.planet VALUES (19, 'Oliver', NULL, NULL, NULL, NULL, NULL, 19);
INSERT INTO public.planet VALUES (20, 'Jayden', NULL, NULL, NULL, NULL, NULL, 20);
INSERT INTO public.planet VALUES (21, 'Joseph', NULL, NULL, NULL, NULL, NULL, 21);
INSERT INTO public.planet VALUES (22, 'Gabriel', NULL, NULL, NULL, NULL, NULL, 22);
INSERT INTO public.planet VALUES (23, 'Samuel', NULL, NULL, NULL, NULL, NULL, 23);
INSERT INTO public.planet VALUES (24, 'Carter', NULL, NULL, NULL, NULL, NULL, 24);
INSERT INTO public.planet VALUES (25, 'Anthony', NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO public.planet VALUES (26, 'John', NULL, NULL, NULL, NULL, NULL, 26);
INSERT INTO public.planet VALUES (27, 'Dylan', NULL, NULL, NULL, NULL, NULL, 27);
INSERT INTO public.planet VALUES (28, 'Luke', NULL, NULL, NULL, NULL, NULL, 28);
INSERT INTO public.planet VALUES (29, 'Henry', NULL, NULL, NULL, NULL, NULL, 29);
INSERT INTO public.planet VALUES (30, 'Andrew', NULL, NULL, NULL, NULL, NULL, 30);
INSERT INTO public.planet VALUES (31, 'Emma', NULL, NULL, NULL, NULL, NULL, 31);
INSERT INTO public.planet VALUES (32, 'Olivia', NULL, NULL, NULL, NULL, NULL, 32);
INSERT INTO public.planet VALUES (33, 'Sophia', NULL, NULL, NULL, NULL, NULL, 33);
INSERT INTO public.planet VALUES (34, 'Ava', NULL, NULL, NULL, NULL, NULL, 34);
INSERT INTO public.planet VALUES (35, 'Isabella', NULL, NULL, NULL, NULL, NULL, 35);
INSERT INTO public.planet VALUES (36, 'Mia', NULL, NULL, NULL, NULL, NULL, 36);
INSERT INTO public.planet VALUES (37, 'Abigail', NULL, NULL, NULL, NULL, NULL, 37);
INSERT INTO public.planet VALUES (38, 'Emily', NULL, NULL, NULL, NULL, NULL, 38);
INSERT INTO public.planet VALUES (39, 'Charlotte', NULL, NULL, NULL, NULL, NULL, 39);
INSERT INTO public.planet VALUES (40, 'Harper', NULL, NULL, NULL, NULL, NULL, 40);
INSERT INTO public.planet VALUES (41, 'Madison', NULL, NULL, NULL, NULL, NULL, 41);
INSERT INTO public.planet VALUES (42, 'Amelia', NULL, NULL, NULL, NULL, NULL, 42);
INSERT INTO public.planet VALUES (43, 'Elizabeth', NULL, NULL, NULL, NULL, NULL, 43);
INSERT INTO public.planet VALUES (44, 'Sofia', NULL, NULL, NULL, NULL, NULL, 44);
INSERT INTO public.planet VALUES (45, 'Evelyn', NULL, NULL, NULL, NULL, NULL, 45);
INSERT INTO public.planet VALUES (46, 'Avery', NULL, NULL, NULL, NULL, NULL, 46);
INSERT INTO public.planet VALUES (47, 'Chloe', NULL, NULL, NULL, NULL, NULL, 47);
INSERT INTO public.planet VALUES (48, 'Ella', NULL, NULL, NULL, NULL, NULL, 48);
INSERT INTO public.planet VALUES (49, 'Grace', NULL, NULL, NULL, NULL, NULL, 49);
INSERT INTO public.planet VALUES (50, 'Victoria', NULL, NULL, NULL, NULL, NULL, 50);
INSERT INTO public.planet VALUES (51, 'Aubrey', NULL, NULL, NULL, NULL, NULL, 51);
INSERT INTO public.planet VALUES (52, 'Scarlett', NULL, NULL, NULL, NULL, NULL, 52);
INSERT INTO public.planet VALUES (53, 'Zoey', NULL, NULL, NULL, NULL, NULL, 53);
INSERT INTO public.planet VALUES (54, 'Addison', NULL, NULL, NULL, NULL, NULL, 54);
INSERT INTO public.planet VALUES (55, 'Lily', NULL, NULL, NULL, NULL, NULL, 55);
INSERT INTO public.planet VALUES (56, 'Lillian', NULL, NULL, NULL, NULL, NULL, 56);
INSERT INTO public.planet VALUES (57, 'Natalie', NULL, NULL, NULL, NULL, NULL, 57);
INSERT INTO public.planet VALUES (58, 'Hannah', NULL, NULL, NULL, NULL, NULL, 58);
INSERT INTO public.planet VALUES (59, 'Aria', NULL, NULL, NULL, NULL, NULL, 59);
INSERT INTO public.planet VALUES (60, 'Layla', NULL, NULL, NULL, NULL, NULL, 60);


--
-- Data for Name: star; Type: TABLE DATA; Schema: public; Owner: freecodecamp
--

INSERT INTO public.star VALUES (1, 'Noah', NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO public.star VALUES (2, 'Liam', NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO public.star VALUES (3, 'Mason', NULL, NULL, NULL, NULL, NULL, 3);
INSERT INTO public.star VALUES (4, 'Jacob', NULL, NULL, NULL, NULL, NULL, 4);
INSERT INTO public.star VALUES (5, 'William', NULL, NULL, NULL, NULL, NULL, 5);
INSERT INTO public.star VALUES (6, 'Ethan', NULL, NULL, NULL, NULL, NULL, 6);
INSERT INTO public.star VALUES (7, 'James', NULL, NULL, NULL, NULL, NULL, 7);
INSERT INTO public.star VALUES (8, 'Alexander', NULL, NULL, NULL, NULL, NULL, 8);
INSERT INTO public.star VALUES (9, 'Michael', NULL, NULL, NULL, NULL, NULL, 9);
INSERT INTO public.star VALUES (10, 'Benjamin', NULL, NULL, NULL, NULL, NULL, 10);
INSERT INTO public.star VALUES (11, 'Elijah', NULL, NULL, NULL, NULL, NULL, 11);
INSERT INTO public.star VALUES (12, 'Daniel', NULL, NULL, NULL, NULL, NULL, 12);
INSERT INTO public.star VALUES (13, 'Aiden', NULL, NULL, NULL, NULL, NULL, 13);
INSERT INTO public.star VALUES (14, 'Logan', NULL, NULL, NULL, NULL, NULL, 14);
INSERT INTO public.star VALUES (15, 'Matthew', NULL, NULL, NULL, NULL, NULL, 15);
INSERT INTO public.star VALUES (16, 'Lucas', NULL, NULL, NULL, NULL, NULL, 16);
INSERT INTO public.star VALUES (17, 'Jackson', NULL, NULL, NULL, NULL, NULL, 17);
INSERT INTO public.star VALUES (18, 'David', NULL, NULL, NULL, NULL, NULL, 18);
INSERT INTO public.star VALUES (19, 'Oliver', NULL, NULL, NULL, NULL, NULL, 19);
INSERT INTO public.star VALUES (20, 'Jayden', NULL, NULL, NULL, NULL, NULL, 20);
INSERT INTO public.star VALUES (21, 'Joseph', NULL, NULL, NULL, NULL, NULL, 21);
INSERT INTO public.star VALUES (22, 'Gabriel', NULL, NULL, NULL, NULL, NULL, 22);
INSERT INTO public.star VALUES (23, 'Samuel', NULL, NULL, NULL, NULL, NULL, 23);
INSERT INTO public.star VALUES (24, 'Carter', NULL, NULL, NULL, NULL, NULL, 24);
INSERT INTO public.star VALUES (25, 'Anthony', NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO public.star VALUES (26, 'John', NULL, NULL, NULL, NULL, NULL, 26);
INSERT INTO public.star VALUES (27, 'Dylan', NULL, NULL, NULL, NULL, NULL, 27);
INSERT INTO public.star VALUES (28, 'Luke', NULL, NULL, NULL, NULL, NULL, 28);
INSERT INTO public.star VALUES (29, 'Henry', NULL, NULL, NULL, NULL, NULL, 29);
INSERT INTO public.star VALUES (30, 'Andrew', NULL, NULL, NULL, NULL, NULL, 30);
INSERT INTO public.star VALUES (31, 'Emma', NULL, NULL, NULL, NULL, NULL, 31);
INSERT INTO public.star VALUES (32, 'Olivia', NULL, NULL, NULL, NULL, NULL, 32);
INSERT INTO public.star VALUES (33, 'Sophia', NULL, NULL, NULL, NULL, NULL, 33);
INSERT INTO public.star VALUES (34, 'Ava', NULL, NULL, NULL, NULL, NULL, 34);
INSERT INTO public.star VALUES (35, 'Isabella', NULL, NULL, NULL, NULL, NULL, 35);
INSERT INTO public.star VALUES (36, 'Mia', NULL, NULL, NULL, NULL, NULL, 36);
INSERT INTO public.star VALUES (37, 'Abigail', NULL, NULL, NULL, NULL, NULL, 37);
INSERT INTO public.star VALUES (38, 'Emily', NULL, NULL, NULL, NULL, NULL, 38);
INSERT INTO public.star VALUES (39, 'Charlotte', NULL, NULL, NULL, NULL, NULL, 39);
INSERT INTO public.star VALUES (40, 'Harper', NULL, NULL, NULL, NULL, NULL, 40);
INSERT INTO public.star VALUES (41, 'Madison', NULL, NULL, NULL, NULL, NULL, 41);
INSERT INTO public.star VALUES (42, 'Amelia', NULL, NULL, NULL, NULL, NULL, 42);
INSERT INTO public.star VALUES (43, 'Elizabeth', NULL, NULL, NULL, NULL, NULL, 43);
INSERT INTO public.star VALUES (44, 'Sofia', NULL, NULL, NULL, NULL, NULL, 44);
INSERT INTO public.star VALUES (45, 'Evelyn', NULL, NULL, NULL, NULL, NULL, 45);
INSERT INTO public.star VALUES (46, 'Avery', NULL, NULL, NULL, NULL, NULL, 46);
INSERT INTO public.star VALUES (47, 'Chloe', NULL, NULL, NULL, NULL, NULL, 47);
INSERT INTO public.star VALUES (48, 'Ella', NULL, NULL, NULL, NULL, NULL, 48);
INSERT INTO public.star VALUES (49, 'Grace', NULL, NULL, NULL, NULL, NULL, 49);
INSERT INTO public.star VALUES (50, 'Victoria', NULL, NULL, NULL, NULL, NULL, 50);
INSERT INTO public.star VALUES (51, 'Aubrey', NULL, NULL, NULL, NULL, NULL, 51);
INSERT INTO public.star VALUES (52, 'Scarlett', NULL, NULL, NULL, NULL, NULL, 52);
INSERT INTO public.star VALUES (53, 'Zoey', NULL, NULL, NULL, NULL, NULL, 53);
INSERT INTO public.star VALUES (54, 'Addison', NULL, NULL, NULL, NULL, NULL, 54);
INSERT INTO public.star VALUES (55, 'Lily', NULL, NULL, NULL, NULL, NULL, 55);
INSERT INTO public.star VALUES (56, 'Lillian', NULL, NULL, NULL, NULL, NULL, 56);
INSERT INTO public.star VALUES (57, 'Natalie', NULL, NULL, NULL, NULL, NULL, 57);
INSERT INTO public.star VALUES (58, 'Hannah', NULL, NULL, NULL, NULL, NULL, 58);
INSERT INTO public.star VALUES (59, 'Aria', NULL, NULL, NULL, NULL, NULL, 59);
INSERT INTO public.star VALUES (60, 'Layla', NULL, NULL, NULL, NULL, NULL, 60);


--
-- Name: description_description_id_seq; Type: SEQUENCE SET; Schema: public; Owner: freecodecamp
--

SELECT pg_catalog.setval('public.description_description_id_seq', 3, true);


--
-- Name: galaxy_galaxy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: freecodecamp
--

SELECT pg_catalog.setval('public.galaxy_galaxy_id_seq', 61, true);


--
-- Name: moon_moon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: freecodecamp
--

SELECT pg_catalog.setval('public.moon_moon_id_seq', 60, true);


--
-- Name: planet_planet_id_seq; Type: SEQUENCE SET; Schema: public; Owner: freecodecamp
--

SELECT pg_catalog.setval('public.planet_planet_id_seq', 60, true);


--
-- Name: star_star_id_seq; Type: SEQUENCE SET; Schema: public; Owner: freecodecamp
--

SELECT pg_catalog.setval('public.star_star_id_seq', 60, true);


--
-- Name: description description_pkey; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.description
    ADD CONSTRAINT description_pkey PRIMARY KEY (description_id);


--
-- Name: galaxy galaxy_pkey; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.galaxy
    ADD CONSTRAINT galaxy_pkey PRIMARY KEY (galaxy_id);


--
-- Name: moon moon_pkey; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.moon
    ADD CONSTRAINT moon_pkey PRIMARY KEY (moon_id);


--
-- Name: planet planet_pkey; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.planet
    ADD CONSTRAINT planet_pkey PRIMARY KEY (planet_id);


--
-- Name: star star_pkey; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.star
    ADD CONSTRAINT star_pkey PRIMARY KEY (star_id);


--
-- Name: description u_description_id; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.description
    ADD CONSTRAINT u_description_id UNIQUE (description_id);


--
-- Name: galaxy u_galaxy_id; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.galaxy
    ADD CONSTRAINT u_galaxy_id UNIQUE (galaxy_id);


--
-- Name: moon u_moon_id; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.moon
    ADD CONSTRAINT u_moon_id UNIQUE (moon_id);


--
-- Name: planet u_planet_id; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.planet
    ADD CONSTRAINT u_planet_id UNIQUE (planet_id);


--
-- Name: star u_star_id; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.star
    ADD CONSTRAINT u_star_id UNIQUE (star_id);


--
-- Name: star fk_galaxy; Type: FK CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.star
    ADD CONSTRAINT fk_galaxy FOREIGN KEY (galaxy_id) REFERENCES public.galaxy(galaxy_id);


--
-- Name: moon fk_planet; Type: FK CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.moon
    ADD CONSTRAINT fk_planet FOREIGN KEY (planet_id) REFERENCES public.planet(planet_id);


--
-- Name: planet fk_star; Type: FK CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.planet
    ADD CONSTRAINT fk_star FOREIGN KEY (star_id) REFERENCES public.star(star_id);


--
-- PostgreSQL database dump complete
--

