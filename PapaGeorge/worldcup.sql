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

DROP DATABASE worldcup;
--
-- Name: worldcup; Type: DATABASE; Schema: -; Owner: freecodecamp
--

CREATE DATABASE worldcup WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'C.UTF-8' LC_CTYPE = 'C.UTF-8';


ALTER DATABASE worldcup OWNER TO freecodecamp;

\connect worldcup

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
-- Name: games; Type: TABLE; Schema: public; Owner: freecodecamp
--

CREATE TABLE public.games (
    game_id integer NOT NULL,
    year integer NOT NULL,
    round character varying(60) NOT NULL,
    winner_id integer NOT NULL,
    opponent_id integer NOT NULL,
    winner_goals integer NOT NULL,
    opponent_goals integer NOT NULL
);


ALTER TABLE public.games OWNER TO freecodecamp;

--
-- Name: games_game_id_seq; Type: SEQUENCE; Schema: public; Owner: freecodecamp
--

CREATE SEQUENCE public.games_game_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.games_game_id_seq OWNER TO freecodecamp;

--
-- Name: games_game_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: freecodecamp
--

ALTER SEQUENCE public.games_game_id_seq OWNED BY public.games.game_id;


--
-- Name: teams; Type: TABLE; Schema: public; Owner: freecodecamp
--

CREATE TABLE public.teams (
    team_id integer NOT NULL,
    name character varying(60) NOT NULL
);


ALTER TABLE public.teams OWNER TO freecodecamp;

--
-- Name: teams_team_id_seq; Type: SEQUENCE; Schema: public; Owner: freecodecamp
--

CREATE SEQUENCE public.teams_team_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.teams_team_id_seq OWNER TO freecodecamp;

--
-- Name: teams_team_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: freecodecamp
--

ALTER SEQUENCE public.teams_team_id_seq OWNED BY public.teams.team_id;


--
-- Name: games game_id; Type: DEFAULT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.games ALTER COLUMN game_id SET DEFAULT nextval('public.games_game_id_seq'::regclass);


--
-- Name: teams team_id; Type: DEFAULT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.teams ALTER COLUMN team_id SET DEFAULT nextval('public.teams_team_id_seq'::regclass);


--
-- Data for Name: games; Type: TABLE DATA; Schema: public; Owner: freecodecamp
--

INSERT INTO public.games VALUES (105, 2018, 'Final', 942, 943, 4, 2);
INSERT INTO public.games VALUES (106, 2018, 'Third Place', 944, 945, 2, 0);
INSERT INTO public.games VALUES (107, 2018, 'Semi-Final', 943, 945, 2, 1);
INSERT INTO public.games VALUES (108, 2018, 'Semi-Final', 942, 944, 1, 0);
INSERT INTO public.games VALUES (109, 2018, 'Quarter-Final', 943, 946, 3, 2);
INSERT INTO public.games VALUES (110, 2018, 'Quarter-Final', 945, 947, 2, 0);
INSERT INTO public.games VALUES (111, 2018, 'Quarter-Final', 944, 948, 2, 1);
INSERT INTO public.games VALUES (112, 2018, 'Quarter-Final', 942, 949, 2, 0);
INSERT INTO public.games VALUES (113, 2018, 'Eighth-Final', 945, 950, 2, 1);
INSERT INTO public.games VALUES (114, 2018, 'Eighth-Final', 947, 951, 1, 0);
INSERT INTO public.games VALUES (115, 2018, 'Eighth-Final', 944, 952, 3, 2);
INSERT INTO public.games VALUES (116, 2018, 'Eighth-Final', 948, 953, 2, 0);
INSERT INTO public.games VALUES (117, 2018, 'Eighth-Final', 943, 954, 2, 1);
INSERT INTO public.games VALUES (118, 2018, 'Eighth-Final', 946, 955, 2, 1);
INSERT INTO public.games VALUES (119, 2018, 'Eighth-Final', 949, 956, 2, 1);
INSERT INTO public.games VALUES (120, 2018, 'Eighth-Final', 942, 957, 4, 3);
INSERT INTO public.games VALUES (121, 2014, 'Final', 958, 957, 1, 0);
INSERT INTO public.games VALUES (122, 2014, 'Third Place', 959, 948, 3, 0);
INSERT INTO public.games VALUES (123, 2014, 'Semi-Final', 957, 959, 1, 0);
INSERT INTO public.games VALUES (124, 2014, 'Semi-Final', 958, 948, 7, 1);
INSERT INTO public.games VALUES (125, 2014, 'Quarter-Final', 959, 960, 1, 0);
INSERT INTO public.games VALUES (126, 2014, 'Quarter-Final', 957, 944, 1, 0);
INSERT INTO public.games VALUES (127, 2014, 'Quarter-Final', 948, 950, 2, 1);
INSERT INTO public.games VALUES (128, 2014, 'Quarter-Final', 958, 942, 1, 0);
INSERT INTO public.games VALUES (129, 2014, 'Eighth-Final', 948, 961, 2, 1);
INSERT INTO public.games VALUES (130, 2014, 'Eighth-Final', 950, 949, 2, 0);
INSERT INTO public.games VALUES (131, 2014, 'Eighth-Final', 942, 962, 2, 0);
INSERT INTO public.games VALUES (132, 2014, 'Eighth-Final', 958, 963, 2, 1);
INSERT INTO public.games VALUES (133, 2014, 'Eighth-Final', 959, 953, 2, 1);
INSERT INTO public.games VALUES (134, 2014, 'Eighth-Final', 960, 964, 2, 1);
INSERT INTO public.games VALUES (135, 2014, 'Eighth-Final', 957, 951, 1, 0);
INSERT INTO public.games VALUES (136, 2014, 'Eighth-Final', 944, 965, 2, 1);


--
-- Data for Name: teams; Type: TABLE DATA; Schema: public; Owner: freecodecamp
--

INSERT INTO public.teams VALUES (942, 'France');
INSERT INTO public.teams VALUES (943, 'Croatia');
INSERT INTO public.teams VALUES (944, 'Belgium');
INSERT INTO public.teams VALUES (945, 'England');
INSERT INTO public.teams VALUES (946, 'Russia');
INSERT INTO public.teams VALUES (947, 'Sweden');
INSERT INTO public.teams VALUES (948, 'Brazil');
INSERT INTO public.teams VALUES (949, 'Uruguay');
INSERT INTO public.teams VALUES (950, 'Colombia');
INSERT INTO public.teams VALUES (951, 'Switzerland');
INSERT INTO public.teams VALUES (952, 'Japan');
INSERT INTO public.teams VALUES (953, 'Mexico');
INSERT INTO public.teams VALUES (954, 'Denmark');
INSERT INTO public.teams VALUES (955, 'Spain');
INSERT INTO public.teams VALUES (956, 'Portugal');
INSERT INTO public.teams VALUES (957, 'Argentina');
INSERT INTO public.teams VALUES (958, 'Germany');
INSERT INTO public.teams VALUES (959, 'Netherlands');
INSERT INTO public.teams VALUES (960, 'Costa Rica');
INSERT INTO public.teams VALUES (961, 'Chile');
INSERT INTO public.teams VALUES (962, 'Nigeria');
INSERT INTO public.teams VALUES (963, 'Algeria');
INSERT INTO public.teams VALUES (964, 'Greece');
INSERT INTO public.teams VALUES (965, 'United States');


--
-- Name: games_game_id_seq; Type: SEQUENCE SET; Schema: public; Owner: freecodecamp
--

SELECT pg_catalog.setval('public.games_game_id_seq', 136, true);


--
-- Name: teams_team_id_seq; Type: SEQUENCE SET; Schema: public; Owner: freecodecamp
--

SELECT pg_catalog.setval('public.teams_team_id_seq', 965, true);


--
-- Name: games games_pkey; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.games
    ADD CONSTRAINT games_pkey PRIMARY KEY (game_id);


--
-- Name: teams teams_name_key; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.teams
    ADD CONSTRAINT teams_name_key UNIQUE (name);


--
-- Name: teams teams_pkey; Type: CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.teams
    ADD CONSTRAINT teams_pkey PRIMARY KEY (team_id);


--
-- Name: games fk_opponent_id; Type: FK CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.games
    ADD CONSTRAINT fk_opponent_id FOREIGN KEY (opponent_id) REFERENCES public.teams(team_id);


--
-- Name: games fk_winner_id; Type: FK CONSTRAINT; Schema: public; Owner: freecodecamp
--

ALTER TABLE ONLY public.games
    ADD CONSTRAINT fk_winner_id FOREIGN KEY (winner_id) REFERENCES public.teams(team_id);


--
-- PostgreSQL database dump complete
--

