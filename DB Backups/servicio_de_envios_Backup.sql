--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

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
-- Name: empresa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.empresa (
    id integer NOT NULL,
    nombre character varying(150) NOT NULL,
    rfc bigint,
    precio_envio double precision NOT NULL
);


ALTER TABLE public.empresa OWNER TO postgres;

--
-- Name: empresa_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.empresa_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.empresa_id_seq OWNER TO postgres;

--
-- Name: empresa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.empresa_id_seq OWNED BY public.empresa.id;


--
-- Name: entrega; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.entrega (
    id integer NOT NULL,
    status boolean NOT NULL,
    empresa_repartidora integer,
    repartidor_encargado integer
);


ALTER TABLE public.entrega OWNER TO postgres;

--
-- Name: entrega_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.entrega_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.entrega_id_seq OWNER TO postgres;

--
-- Name: entrega_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.entrega_id_seq OWNED BY public.entrega.id;


--
-- Name: repartidor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.repartidor (
    id integer NOT NULL,
    nombre character varying(150),
    apellido_materno character varying(150),
    apellido_paterno character varying(150),
    empresa_empleadora integer
);


ALTER TABLE public.repartidor OWNER TO postgres;

--
-- Name: repartidor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.repartidor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.repartidor_id_seq OWNER TO postgres;

--
-- Name: repartidor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.repartidor_id_seq OWNED BY public.repartidor.id;


--
-- Name: empresa id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.empresa ALTER COLUMN id SET DEFAULT nextval('public.empresa_id_seq'::regclass);


--
-- Name: entrega id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entrega ALTER COLUMN id SET DEFAULT nextval('public.entrega_id_seq'::regclass);


--
-- Name: repartidor id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.repartidor ALTER COLUMN id SET DEFAULT nextval('public.repartidor_id_seq'::regclass);


--
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.empresa (id, nombre, rfc, precio_envio) FROM stdin;
1	Fowler-Proctor	456062280500005498	8.83
2	Price-West	115892432769571475	17.41
3	Miller-Ellison	441374579528219291	11.15
4	Roberts-Huff	153660948487607623	8.12
5	Gonzalez-Mcguire	580435897753612793	8
6	Davis-Willis	505610519995201977	14.41
7	Contreras and Sons	259083259858462855	6.9
8	Macias LLC	615801121907977019	8.82
9	Smith, Reyes and Perez	763344558137844002	15.97
10	Ryan Group	909828095230647804	15.18
11	Martin, Mills and Castillo	347473732230050580	14.39
12	Banks and Sons	642313225170662172	7.33
13	Stanley PLC	553731085723201122	14.21
14	Miller, Pena and Hicks	136055748175340585	16.78
15	Peterson-Roberts	472260859169577531	17.61
16	Nelson, Stevenson and Hudson	855038902743171558	11.64
17	Powers PLC	136180308200664283	19.6
18	Thomas-Sampson	973494970032164991	7.31
19	Brown, Griffin and Green	763894503409543807	5.86
20	Ramirez, Pope and Howard	787141620411055605	8.59
21	Jennings-Wheeler	871561759020167449	5.77
22	Stokes Group	114498595177983142	7.07
23	Moore Ltd	688389353262534292	14.1
24	Thomas, Snyder and Sanchez	504492439206599214	12.28
25	Blake-Smith	612117400206587522	8.29
\.


--
-- Data for Name: entrega; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.entrega (id, status, empresa_repartidora, repartidor_encargado) FROM stdin;
1	t	13	12
2	t	21	90
3	t	22	197
4	t	19	190
5	f	1	87
6	f	13	36
7	f	14	21
8	f	8	171
9	f	4	70
10	f	13	156
11	f	25	180
12	f	4	184
13	f	23	151
14	t	4	77
15	t	23	123
16	f	9	42
17	f	11	48
18	t	4	107
19	f	14	39
20	t	20	66
21	f	24	86
22	f	20	105
23	f	19	37
24	t	17	138
25	f	10	189
26	t	20	143
27	t	22	105
28	f	21	68
29	f	12	76
30	f	8	132
31	f	8	90
32	f	22	184
33	t	10	74
34	t	17	19
35	t	15	32
36	t	11	60
37	t	17	60
38	t	25	22
39	t	4	60
40	t	6	139
41	t	6	66
42	f	19	180
43	t	11	46
44	f	14	138
45	t	21	136
46	f	14	103
47	t	19	32
48	t	14	11
49	t	17	66
50	f	21	112
51	t	4	168
52	f	5	38
53	t	21	181
54	t	19	191
55	f	21	11
56	t	4	193
57	f	22	176
58	f	10	68
59	f	23	42
60	t	8	30
61	f	19	6
62	t	9	129
63	t	13	33
64	f	18	5
65	t	8	89
66	f	19	29
67	f	15	94
68	t	8	57
69	f	8	60
70	f	4	80
71	f	25	98
72	t	21	1
73	f	21	36
74	f	24	134
75	f	20	137
76	t	24	190
77	f	1	144
78	f	14	144
79	t	9	179
80	t	16	2
81	t	10	154
82	t	2	103
83	t	10	19
84	f	4	25
85	t	20	62
86	t	25	177
87	f	21	182
88	t	16	195
89	f	15	54
90	t	16	90
91	t	22	159
92	t	4	199
93	t	14	100
94	f	11	138
95	f	7	175
96	t	13	105
97	f	1	119
98	f	22	161
99	f	1	166
100	f	25	124
101	t	7	34
102	f	16	109
103	f	7	106
104	f	6	181
105	f	19	35
106	t	25	70
107	t	7	95
108	t	3	47
109	f	1	65
110	f	21	129
111	f	3	30
112	t	8	70
113	t	10	21
114	t	16	52
115	t	12	148
116	t	15	149
117	f	1	23
118	f	1	84
119	f	1	50
120	f	6	96
121	t	20	171
122	f	25	44
123	f	25	139
124	f	18	176
125	f	24	153
126	f	17	191
127	f	18	108
128	t	13	187
129	t	25	149
130	f	7	64
131	f	2	152
132	t	19	14
133	t	24	60
134	t	1	6
135	t	25	70
136	f	16	87
137	f	15	194
138	f	8	191
139	f	7	135
140	t	14	43
141	t	8	131
142	f	17	129
143	f	22	4
144	f	5	31
145	t	19	46
146	f	11	199
147	t	10	32
148	f	6	46
149	t	19	82
150	t	4	83
151	f	5	160
152	f	23	129
153	f	5	156
154	t	18	146
155	f	15	150
156	t	8	8
157	f	17	170
158	t	5	40
159	f	25	61
160	f	2	107
161	f	15	82
162	t	15	138
163	f	1	71
164	f	24	140
165	f	24	90
166	t	9	180
167	f	10	3
168	t	24	5
169	f	17	124
170	f	13	137
171	t	3	145
172	t	17	120
173	t	15	92
174	f	4	155
175	f	10	152
176	f	21	92
177	t	19	138
178	t	17	88
179	f	21	37
180	t	12	25
181	t	22	189
182	t	8	177
183	f	1	74
184	t	21	21
185	f	13	92
186	t	6	80
187	t	23	185
188	f	1	114
189	f	21	95
190	t	25	75
191	f	23	88
192	f	8	174
193	f	19	5
194	t	4	74
195	t	24	152
196	t	14	170
197	f	22	37
198	t	3	16
199	t	1	70
200	f	8	33
201	f	9	15
202	t	23	196
203	t	20	196
204	f	7	105
205	t	9	67
206	t	8	5
207	t	10	100
208	t	5	4
209	t	4	144
210	f	21	61
211	t	13	89
212	t	5	90
213	f	21	178
214	t	4	124
215	t	12	115
216	t	15	16
217	f	22	80
218	t	6	119
219	t	5	94
220	t	14	96
221	f	20	195
222	t	5	158
223	t	1	100
224	f	5	38
225	f	13	141
226	f	21	49
227	t	21	113
228	t	5	39
229	f	21	28
230	f	24	194
231	f	2	99
232	t	15	50
233	f	15	183
234	f	13	183
235	t	8	97
236	t	21	56
237	t	16	19
238	t	25	82
239	t	2	145
240	t	21	180
241	t	22	61
242	f	9	87
243	t	18	49
244	f	9	89
245	t	22	83
246	f	7	173
247	f	23	13
248	f	8	79
249	t	5	50
250	t	15	87
251	f	10	130
252	f	19	46
253	t	12	5
254	t	10	46
255	t	19	4
256	t	23	187
257	t	15	40
258	t	7	66
259	f	24	45
260	t	1	79
261	t	18	179
262	t	17	169
263	f	14	91
264	f	14	5
265	t	23	112
266	t	21	154
267	t	6	100
268	t	24	166
269	f	8	78
270	t	4	106
271	f	22	171
272	f	12	72
273	f	20	44
274	f	18	88
275	f	21	38
276	t	15	58
277	t	15	196
278	f	6	186
279	t	14	75
280	t	15	95
281	t	21	7
282	f	9	148
283	t	14	168
284	t	25	136
285	t	23	25
286	f	25	151
287	f	15	3
288	f	14	69
289	f	7	74
290	f	11	183
291	f	23	108
292	f	15	15
293	f	23	147
294	t	1	85
295	t	20	186
296	t	3	103
297	f	8	129
298	t	19	106
299	f	23	28
300	t	7	139
301	t	1	95
302	t	2	26
303	f	5	107
304	t	1	169
305	t	15	58
306	t	14	55
307	t	13	52
308	f	12	156
309	f	21	86
310	f	19	49
311	f	7	147
312	t	15	40
313	f	10	6
314	t	6	56
315	f	18	161
316	f	10	170
317	f	4	28
318	f	22	95
319	f	2	144
320	f	20	79
321	t	17	196
322	f	9	41
323	f	9	126
324	t	2	56
325	f	3	128
326	f	10	21
327	t	15	12
328	f	6	26
329	f	8	87
330	f	23	19
331	t	24	24
332	f	19	95
333	t	2	132
334	f	18	24
335	f	19	3
336	t	23	191
337	f	7	51
338	t	16	133
339	t	23	182
340	f	18	115
341	f	11	32
342	f	3	168
343	f	16	2
344	t	3	166
345	t	9	147
346	t	17	66
347	f	3	24
348	f	18	76
349	t	25	112
350	f	5	60
351	f	1	179
352	f	24	186
353	t	17	93
354	t	10	38
355	t	6	83
356	t	9	54
357	f	18	60
358	f	8	79
359	t	16	53
360	t	13	114
361	t	1	194
362	f	20	158
363	t	16	176
364	f	18	155
365	t	10	7
366	f	6	128
367	t	20	50
368	f	17	179
369	t	3	117
370	t	19	3
371	t	5	189
372	f	7	60
373	t	4	136
374	t	2	128
375	t	19	116
376	t	23	62
377	f	22	162
378	f	18	33
379	f	23	82
380	f	8	53
381	t	9	99
382	t	23	161
383	f	13	168
384	t	1	130
385	t	5	52
386	f	3	140
387	f	20	198
388	f	16	131
389	t	8	15
390	f	1	38
391	f	1	2
392	t	13	84
393	t	25	84
394	t	8	150
395	t	12	101
396	t	17	35
397	f	16	196
398	t	17	148
399	f	25	133
400	t	21	187
401	f	9	64
402	f	1	16
403	f	25	107
404	t	23	91
405	f	25	82
406	t	9	66
407	f	22	131
408	f	10	163
409	f	14	45
410	t	13	71
411	f	21	9
412	t	24	56
413	f	19	39
414	f	9	158
415	f	23	176
416	t	3	156
417	f	17	119
418	f	1	11
419	f	23	13
420	t	18	97
421	t	6	22
422	t	6	93
423	t	25	2
424	f	24	195
425	t	2	82
426	t	25	75
427	f	16	145
428	t	19	8
429	t	17	183
430	t	1	186
431	f	14	14
432	t	12	135
433	f	14	106
434	f	5	42
435	f	4	133
436	f	3	173
437	t	4	71
438	t	11	104
439	t	9	13
440	f	4	162
441	t	15	200
442	t	8	29
443	f	3	178
444	t	16	79
445	t	9	137
446	f	13	200
447	f	1	176
448	t	2	58
449	t	19	159
450	t	9	5
451	f	25	198
452	t	22	179
453	t	24	181
454	f	5	2
455	t	25	162
456	t	19	91
457	t	15	44
458	f	14	6
459	f	8	39
460	t	3	114
461	f	8	135
462	f	18	122
463	f	21	68
464	f	11	22
465	f	15	116
466	t	25	15
467	t	12	4
468	t	3	100
469	f	14	195
470	t	21	120
471	t	21	114
472	f	12	82
473	t	18	26
474	t	4	196
475	t	8	1
476	f	1	105
477	f	16	194
478	t	10	101
479	t	3	163
480	t	4	148
481	f	21	22
482	f	23	92
483	f	14	151
484	t	9	113
485	f	25	195
486	t	18	160
487	f	12	169
488	t	10	25
489	f	5	61
490	f	11	148
491	f	22	196
492	f	24	38
493	t	2	59
494	t	2	91
495	t	24	65
496	f	19	87
497	t	11	143
498	t	10	124
499	t	15	67
500	t	17	10
\.


--
-- Data for Name: repartidor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.repartidor (id, nombre, apellido_materno, apellido_paterno, empresa_empleadora) FROM stdin;
1	Nathaniel	Johnson	Miller	4
2	Anita	Shaffer	Barnett	4
3	Jessica	Malone	Thompson	4
4	Mark	Malone	Miller	3
5	Kevin	Reeves	Brown	2
6	Brian	Williams	Garza	2
7	Adam	Hardy	Clark	2
8	John	Rodriguez	Stephens	4
9	Henry	Poole	Johnson	1
10	Barbara	Wright	Foster	4
11	Hannah	Huerta	Trujillo	2
12	Dominique	Krause	Tucker	4
13	Vanessa	Chavez	Taylor	1
14	Chelsea	Rivers	Fox	5
15	Regina	Martinez	Vasquez	3
16	Samuel	Combs	Atkinson	2
17	Terry	Payne	Hoffman	1
18	Jennifer	Andrews	Pope	1
19	Matthew	Hill	Frost	3
20	Andrea	Williams	Foley	2
21	Christina	King	Irwin	5
22	Derek	Morris	Rivera	1
23	Nicole	Williams	Barnes	5
24	Ashley	Pruitt	Zhang	1
25	Randy	Williams	Goodman	3
26	Stephen	Mills	Campos	4
27	Karen	Armstrong	Briggs	3
28	Sheila	Thompson	Lee	2
29	Laura	Burgess	Baker	1
30	Tracey	Heath	Massey	3
31	Stephen	Hernandez	Mejia	5
32	Tristan	Dixon	Brown	1
33	Michael	Brooks	Watson	1
34	Amber	Arnold	Miller	4
35	Edward	Stevenson	Willis	4
36	Jasmine	Nunez	Freeman	5
37	Christina	English	Smith	2
38	Mary	Murray	Stanley	5
39	Christina	Hamilton	Miller	3
40	Lauren	Bishop	Howard	3
41	Kara	King	Nelson	4
42	Deanna	Harris	Sanders	1
43	Cynthia	Spencer	Garcia	1
44	Jonathan	Moses	Franklin	4
45	Todd	Lynn	Hall	4
46	Nicholas	Tyler	Carroll	3
47	Connor	Campbell	Smith	3
48	Nathan	Cruz	Murphy	2
49	Barbara	Allen	Martin	1
50	Dwayne	Horton	Callahan	4
51	Jacob	Smith	Becker	4
52	Beth	Hughes	Zamora	3
53	Heather	Baker	Medina	1
54	Jeffrey	Pace	Pollard	1
55	Kevin	Gould	Salas	1
56	Courtney	Valdez	Torres	1
57	Patricia	Flynn	Nguyen	2
58	Shelia	Vazquez	Lawrence	2
59	Jordan	Stewart	Knight	5
60	Destiny	Mcfarland	Lopez	2
61	Corey	Andrews	Wright	1
62	Shelley	Mullins	Flowers	2
63	Natalie	Bowen	Quinn	3
64	Stephen	Holland	Armstrong	3
65	Monica	Camacho	Kline	5
66	Mary	Simon	Conner	3
67	Jennifer	Nelson	Rodriguez	5
68	April	Lopez	Zuniga	1
69	Samuel	Vargas	Dominguez	1
70	Devin	Carrillo	Rios	2
71	Cynthia	Johnston	Jones	4
72	Christopher	Hill	Jackson	2
73	Joseph	Marshall	Mills	4
74	Nicholas	Huynh	Nelson	2
75	Anthony	Smith	Patterson	3
76	Marcus	Bishop	Smith	3
77	Nicholas	Smith	Gardner	4
78	Monique	Malone	Rowe	3
79	Jason	Fields	Dixon	5
80	John	Scott	Schmidt	5
81	Vanessa	Rodriguez	Simpson	5
82	Heather	Johnson	Fitzgerald	5
83	Curtis	Pierce	Hudson	5
84	Mark	Jones	Pennington	4
85	Lindsey	Martinez	Jenkins	2
86	Debra	Schroeder	Conway	1
87	Katherine	Trujillo	Martinez	4
88	Lisa	Goodwin	Brewer	1
89	Adam	Gonzales	Dudley	1
90	Eric	Smith	Marquez	5
91	Mark	Romero	Taylor	1
92	Jacqueline	Parker	Harper	5
93	Jessica	Campbell	Stone	5
94	Leah	Johnson	Simmons	3
95	Andrew	Thompson	Smith	4
96	Pamela	Henson	Moon	2
97	Pamela	Moore	Reynolds	1
98	George	Lopez	Anderson	5
99	Sarah	Graham	White	3
100	Christopher	Cabrera	Diaz	4
101	Christopher	Williams	Clay	2
102	Stephen	Arias	Wiggins	2
103	Joseph	Rivera	Mason	1
104	Cole	Torres	Martin	1
105	Kimberly	Haas	Vazquez	3
106	Mario	Nelson	Beck	4
107	Kellie	Boyle	Stevens	2
108	Colin	Yates	Yoder	1
109	Debra	Estrada	Haas	2
110	Stephen	Cummings	Gonzales	3
111	Heather	Morales	Fletcher	4
112	Kim	Booth	Rollins	1
113	Charles	Perez	Haynes	5
114	Willie	Stanley	Neal	2
115	Joseph	Rodriguez	Berg	4
116	Jeffrey	Flores	Smith	4
117	Shawna	Cummings	Banks	3
118	Micheal	Nunez	Mccarthy	2
119	Paula	Young	Sherman	3
120	Rodney	Peterson	Jenkins	1
121	Dawn	Buchanan	Chambers	2
122	Paula	Wang	Wilkerson	3
123	Paul	Smith	Rodriguez	3
124	Omar	Flores	Flores	1
125	Dennis	Hall	Owens	1
126	Tanner	Long	Powers	5
127	Victoria	Barrett	Shaw	5
128	Joel	Anderson	Goodwin	1
129	Jennifer	Smith	Brewer	1
130	Ronald	Murphy	Deleon	3
131	Caleb	Allen	Calhoun	1
132	William	Miller	Nelson	1
133	Tim	Kennedy	Byrd	2
134	Tara	Jacobs	Graves	2
135	Ryan	Sanchez	Hayes	5
136	Cody	Morgan	Carlson	5
137	Rachael	Johnson	Morrow	5
138	Yvette	Zavala	Tyler	2
139	Tammy	Hill	Stewart	5
140	Paul	Hayes	Brown	4
141	Robert	Perez	Stewart	2
142	Katie	Burke	Diaz	1
143	Damon	Young	Hale	5
144	Cynthia	Vega	Espinoza	2
145	Mindy	Collins	Moreno	1
146	Melissa	Lester	Obrien	4
147	Jill	Herring	Burch	3
148	Jermaine	Taylor	Mckenzie	1
149	Susan	Gray	Castaneda	2
150	Lori	Garcia	Lam	4
151	Tracey	Copeland	Sanchez	2
152	Michael	Nelson	House	4
153	Christina	Gardner	Olsen	4
154	Michael	Tyler	Davenport	4
155	Gregory	Gonzalez	Wood	5
156	Kenneth	Vaughan	Curry	3
157	Sarah	Kline	Hernandez	5
158	Nicole	Osborne	Barber	3
159	Ian	Gill	Smith	2
160	Derek	Villa	Black	5
161	David	Hurst	Foster	3
162	Dillon	Stephens	Castillo	4
163	Daniel	Smith	Hernandez	5
164	Robert	Miller	Lin	1
165	Kelly	Harris	Luna	3
166	Alexandra	Martinez	Anderson	5
167	Jesse	Chavez	Chan	4
168	Arthur	Gonzalez	Green	1
169	Brenda	Wilson	Stuart	3
170	Jonathan	Wright	Miller	3
171	Jean	Tucker	Scott	1
172	Timothy	Hess	Rivera	1
173	Ashley	Jenkins	Delgado	4
174	Keith	Wagner	Park	5
175	Michelle	Martin	Munoz	2
176	Robin	Adams	Carpenter	1
177	Heidi	Johnson	Flores	4
178	Daniel	Moore	Suarez	5
179	Latoya	Jones	Daniels	4
180	Henry	Acosta	Edwards	2
181	Christina	Owens	Munoz	2
182	Amy	Smith	Lewis	4
183	Jo	Brown	Castillo	3
184	Stephanie	Rivers	Kim	3
185	Jimmy	Kidd	Pena	2
186	Gabrielle	Brown	Mueller	3
187	Carly	Barber	Mcfarland	5
188	Jimmy	Lewis	May	2
189	Jacqueline	Jones	Miller	2
190	Mark	Shields	Perry	2
191	Tammy	Thornton	Martinez	3
192	Gregory	Lee	Schneider	1
193	Courtney	Mitchell	Mcdowell	3
194	Rick	Stewart	Leach	1
195	Michael	Harris	Arroyo	1
196	Mary	Smith	Stephens	5
197	Beth	Rose	Davis	5
198	Robin	Jenkins	Rodriguez	4
199	Krista	Thomas	Gentry	2
200	Stephanie	Kidd	Scott	3
\.


--
-- Name: empresa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.empresa_id_seq', 25, true);


--
-- Name: entrega_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.entrega_id_seq', 500, true);


--
-- Name: repartidor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.repartidor_id_seq', 200, true);


--
-- Name: empresa empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.empresa
    ADD CONSTRAINT empresa_pkey PRIMARY KEY (id);


--
-- Name: entrega entrega_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entrega
    ADD CONSTRAINT entrega_pkey PRIMARY KEY (id);


--
-- Name: repartidor repartidor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.repartidor
    ADD CONSTRAINT repartidor_pkey PRIMARY KEY (id);


--
-- Name: entrega entrega_empresa_repartidora_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entrega
    ADD CONSTRAINT entrega_empresa_repartidora_fkey FOREIGN KEY (empresa_repartidora) REFERENCES public.empresa(id);


--
-- Name: entrega entrega_repartidor_encargado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entrega
    ADD CONSTRAINT entrega_repartidor_encargado_fkey FOREIGN KEY (repartidor_encargado) REFERENCES public.repartidor(id);


--
-- Name: repartidor repartidor_empresa_empleadora_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.repartidor
    ADD CONSTRAINT repartidor_empresa_empleadora_fkey FOREIGN KEY (empresa_empleadora) REFERENCES public.empresa(id);


--
-- PostgreSQL database dump complete
--

